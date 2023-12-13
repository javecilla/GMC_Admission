<x-app-layout title="Admission">
  <x-slot name="description">admission test description here...</x-slot>
  <x-section>
    <h1>testing success...</h1>
    <button type="button" class="btn btn-success" id="btnTest">test jquery</button>

    <script defer>
      jQuery(document).ready(function() {
        const btn = $('#btnTest');
        const arr = ['shs', 'jhs'];

        btn.on('click', function(e) {
          e.preventDefault();

          alert("hello");
          $(this).text('galing');
          for(let data of arr) {
            console.log(data);
          }
        });
      });
    </script>
  </x-section>
</x-app-layout>
