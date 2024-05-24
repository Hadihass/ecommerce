$('.counter-plus').click(function(e){
   let qt = $(e.currentTarget).siblings('#qt');
   let qtvalue = parseInt(qt.val())+1
   if(qtvalue > 99){
    qtvalue = 99
}
   qt.val(qtvalue)
});
$('.counter-moins').click(function(e){
    let qt = $(e.currentTarget).siblings('#qt');
    let qtvalue = parseInt(qt.val())-1
    if(qtvalue < 0){
        qtvalue = 0
    }
    qt.val(qtvalue)
 });