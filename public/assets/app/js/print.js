function pixelToMM(px){
    return px*0.2645833333;
}
function $_print(){
    var classz=$("#page-wrapper").attr("class").split(" ");
    for(var i=0;i<classz.length;i++){
        var found=classz[i].includes("page-width-");
        if (found) {
            classz=classz[0].replace("page-width-","").split("-")[1];
            break;
        }
    }
    $('head').append(`<style>@page{size: ${classz};}</style>`)
}

$(document).ready(function(){
   $_print();
});