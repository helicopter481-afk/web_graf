{{-- WRAPPER UTAMA BAB 4 --}}
<div id="bab-4-container" class="w-full">
    
    {{-- Memanggil semua step secara berurutan sesuai struktur foldermu --}}
    @include('modules.contents.bab4.step0')
    @include('modules.contents.bab4.step1')
    @include('modules.contents.bab4.step2')
    @include('modules.contents.bab4.step3')
    @include('modules.contents.bab4.step4')
    @include('modules.contents.bab4.step5')
    @include('modules.contents.bab4.step6')
    @include('modules.contents.bab4.step7')

</div>
<script src="{{ asset('js/bab1.js') }}"></script>