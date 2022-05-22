
<style>
    .slider{
    width: 100%;
    position: relative;
    background: rgb(0, 0, 0);
}
.slide{
    width: 100%;
    height: 910px;
}
#prev{
    font-size: 35px;
    color: white;
    text-transform: uppercase;
    position: absolute;
    left: 20px;
    top: 50%;
    opacity: 0.6;
}
#prev:hover{
    color: tomato;
}
#next{
    font-size: 35px;
    color:  white;
    text-transform: uppercase;
    position: absolute;
    right: 20px;
    top:50%;
    opacity: 0.6;
}
#next:hover{
    color: tomato;
}
</style>
	
            <div class="slider">
                <img class="slide" stt="0" src="https://media.ex-cdn.com/EXP/media.nhadautu.vn/files/content/2021/01/26/beauty_success-terre-dhermes-0631.jpg"/>
                <img class="slide" style="display:none" stt="1" src="https://bloganchoi.com/wp-content/uploads/2019/06/co-gai-tu-tin.jpg"/> 
                <img class="slide" style="display:none" stt="2" src="https://kenh14cdn.com/Uploaded/Share/2011/11/03/111104FaNews09.jpg"/> 
                <img class="slide" style="display:none" stt="3" src="https://parisvietnam.vn/wp-content/uploads/2017/10/LancomeLaNuitTresor.jpg"/>
		<a href="#" id="prev"><i class="fas fa-chevron-left"></i></a>
                <a href="#" id="next"><i class="fas fa-chevron-right"></i></a>
            </div>
        <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
        <script>
            $(()=>{
                $('#next').click(function(){
                    changeImage('next');
                })
                $('#prev').click(function(){
                    changeImage('prev');
                })
            })
           function changeImage(type){
                let imgSelectVisible = $('img.slide:visible');
                let imgVisible = parseInt(imgSelectVisible.attr('stt'));
                let eqNumber = type === 'next' ? imgVisible + 1 : imgVisible - 1;
                if(eqNumber >= $('.slide').length){
                    eqNumber=0;
                }
                $('img.slide').eq(eqNumber).fadeToggle(3000);
                imgSelectVisible.hide();
            }
           setInterval(function(){
                $('#next').click();
            },3000);
        </script>