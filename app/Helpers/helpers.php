<?php 
if (! function_exists('TanggalID')) {         
    
    /**
     * TanggalID
     *
     * @param  mixed $tanggal
     * @return void
     */
    function TanggalID($tanggal) {
        $value = Carbon\Carbon::parse($tanggal);
        $parse = $value->locale('id');
        return $parse->translatedFormat('l, d F Y H:i');
    }
}