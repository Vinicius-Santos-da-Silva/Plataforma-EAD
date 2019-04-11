setInterval(updateArea,200);
function updateArea() {
	var alturaTela = $(window).height();
	var posy = $('.curso_left').offset().top;
	var altura = alturaTela - posy;

	$('.curso_left, .curso_right').css('height',altura+'px');

}

$(function(){
	$('textarea').empty();
})

function marcarAssistido(obj){
	let id = $(obj).attr('data-id');
	console.log(id)

	obj.remove();

	$.ajax({
		url: '/ead/ajax/marcarAssistido/'+id,
		type: 'GET'
	});
}