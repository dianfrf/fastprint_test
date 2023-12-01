const flashData  = $('.flash-data').data('flashdata');
const flashDatas = $('.flash-datas').data('flashdatas');
if (flashData) {
    swal({
        title: "",   
        text: ""+flashData,
        type: "warning",
        confirmButtonColor: "#f0c541",   
    });
}
if (flashDatas) {
    swal({
        title: "",   
        text: ""+flashDatas,
        type: "success",
        confirmButtonColor: "#2ecd99",   
    });
}
$('.btnhapus').on('click',function(e){
    e.preventDefault();
    const href = $(this).attr('href');
    swal({   
        title: "Yakin untuk hapus produk ini?",
        text: "Klik hapus untuk melanjutkan",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#f33b3b",   
        confirmButtonText: "Hapus",   
        cancelButtonText: "Batal",   
        closeOnConfirm: false,   
        closeOnCancel: true
    }, function(isConfirm){   
        if (isConfirm) {     
            document.location.href = href;  
        }
    });
});