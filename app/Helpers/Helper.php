<?php 

function formatPeso($number)
{
    return "₱ " . number_format($number, 0, ',', '.');
}

function tanggal($tanggal){
    return \Carbon\Carbon::parse($tanggal)->format('d F Y');
}
