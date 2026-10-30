var iTotal;
var sKupon;

iTotal = prompt("Masukkan total belanja (dalam ribu rupiah).", 0);
sKupon = prompt("Punya kupon? (Y)a atau (T)idak", "Y");

if (iTotal >= 200){
    if (sKupon == "Y"){
        alert("Diskon 20% dan gratis ongkir");
    }else{
        alert("Diskon 105 dan gratis ongkir");
    }
}else{
    if(sKupon == "Y"){
        alert("Diskon 10%");
    }else{
        alert("Tidak ada diskon");
    }
}
