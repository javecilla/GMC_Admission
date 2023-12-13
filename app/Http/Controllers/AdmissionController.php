<?php

namespace App\Http\Controllers;

use App\Exceptions\FailedSendAppointmentException;
use App\Exceptions\FailedSubmitApplicationException;
use App\Exceptions\InvalidRecaptchaException;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdmissionRequest;
use App\Services\AdmissionService;
use App\Services\EmailService;
use App\Services\RecaptchaService;
use Illuminate\Http\Request;

class AdmissionController extends Controller {
	// To view application form
	public static function create(Request $request) {
		return view('contents.seniorhigh.create');
	}

	// To store the submitted data in application form
	public static function store(AdmissionRequest $admissionRequest,
		RecaptchaService $recaptchaService,
		AdmissionService $admissionService,
		EmailService $emailService) {
		try {
			//verify the recaptcha
			$verificationResult = $recaptchaService->verify($admissionRequest->input('g-recaptcha-response'));

			// compact all data submitted by applicant
			$applicantData = [
				'reg_date' => $admissionRequest->input('registrationDate'),
				'sy' => $admissionRequest->input('schoolYear'),
				'semester' => $admissionRequest->input('semester'),
				'school' => $admissionRequest->input('branchCampus'),
				'strand' => $admissionRequest->input('strandList'),
				'lrn' => $admissionRequest->input('LRN'),
				//full name of the applicant e.g., Avecilla, Jerome Jr. S.
				'learners_name' => $admissionRequest->input('lastName') . ', ' . $admissionRequest->input('firstName') . $admissionRequest->input('extensionName') . $admissionRequest->input('middleName'),
				'last_name' => $admissionRequest->input('lastName'),
				'extension_name' => $admissionRequest->input('extensionName'),
				'first_name' => $admissionRequest->input('firstName'),
				'middle_name' => $admissionRequest->input('middleName'),
				'gender' => $admissionRequest->input('genderSelected'),
				'birthday' => $admissionRequest->input('birthday'),
				'age' => $admissionRequest->input('age'),
				'birthplace' => $admissionRequest->input('placeOfBirth'),
				'nationality' => $admissionRequest->input('nationality'),
				'religion' => $admissionRequest->input('religion'),
				'completion_date' => $admissionRequest->input('completionDate'),
				'completer_as' => $admissionRequest->input('completerAs'),
				'school_name' => $admissionRequest->input('formerSchoolName'),
				'school_address' => $admissionRequest->input('formerSchoolAddress'),
				'house_no' => $admissionRequest->input('address'),
				'brgy' => $admissionRequest->input('baranggay'),
				'city' => $admissionRequest->input('municipality'),
				'province' => $admissionRequest->input('region'),
				'contact_no' => $admissionRequest->input('contactno'),
				'fathers_name' => $admissionRequest->input('fathersFullName'),
				'foccupation' => $admissionRequest->input('fathersOccupation'),
				'mothers_name' => $admissionRequest->input('mothersFullName'),
				'moccupation' => $admissionRequest->input('mothersOccupation'),
				'guardian_name' => $admissionRequest->input('guardiansFullName'),
				'relationship' => $admissionRequest->input('guardiansRelationship'),
				'gcontact_no' => $admissionRequest->input('guardiansContactNo'),
				'goccupation' => $admissionRequest->input('guardiansOccupation'),
				'guardian_address' => $admissionRequest->input('guardiansAddress'),
				'referral_name' => $admissionRequest->input('referralFullName'),
				'referral_number' => $admissionRequest->input('referralContactNo'),
				'grade10_adviser' => $admissionRequest->input('formerAdviserName'),
				'grade10_section' => $admissionRequest->input('formerSection'),
				'good_moral' => $admissionRequest->input('goodMoral'),
				'card' => $admissionRequest->input('card'),
				'f137' => $admissionRequest->input('form137'),
				'psa_remarks' => $admissionRequest->input('psa'),
				'stud_id' => $admissionRequest->input('Id'),
				'pe_shirt' => $admissionRequest->input('peShirt'),
				'waiver' => $admissionRequest->input('waiver'),
				'uniform' => $admissionRequest->input('uniform'),
				'allowance' => $admissionRequest->input('allowance'),
				'document_filed' => $admissionRequest->input('documentFiled'),
				'email' => $admissionRequest->input('email'),
			];

			//inserting all the data into database
			$admissionResult = $admissionService->storeApplicationSHS($applicantData);

			//send email for applicant appoinment schedule
			$appointmentScheduleResult = $emailService->sendAppointmentSchedule($applicantData);

			// return the result to client side
			return response()->json($appointmentScheduleResult);
		} catch (InvalidRecaptchaException $invalidRecaptchaException) {
			return response()->json(['success' => false, 'message' => $invalidRecaptchaException->getMessage()]);
		} catch (FailedSubmitApplicationException $failedSubmitApplicationException) {
			return response()->json(['success' => false, 'message' => $failedSubmitApplicationException->getMessage()]);
		} catch (FailedSendAppointmentException $failedSendAppointmentException) {
			return response()->json(['success' => false, 'message' => $failedSubmitApplicationException->getMessage()]);
		} catch (\Exception $exception) {
			return response()->json(['success' => false, 'message' => $exception->getMessage()]);
		}
	}
}