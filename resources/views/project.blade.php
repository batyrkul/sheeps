<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TestProject</title> 

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
		<link href="/css/style.css" rel="stylesheet">  
		<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">  
		<script
		src="https://code.jquery.com/jquery-3.4.1.min.js"
		integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
		crossorigin="anonymous"></script> 
		<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>  
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> 
		<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.min.js"></script> 
		
       
    </head>
    <body >
		<section class="container" id="app">
			<div class="container">
					<div class="row">
						<div class="col-lg-3 zgz">
							<h4>Загон 1</h4>
							<div class="zag-cont">
								<p v-if="sheeps.zag1!=0" v-for="n in parseInt(sheeps.zag1)">
									Овечка @{{n}}
								</p>  
							
							</div>
						
						</div>
						<div class="col-lg-3 zgz">
							<h4>Загон 2</h4>
							<div class="zag-cont">
								<p v-if="sheeps.zag2!=0" v-for="n in parseInt(sheeps.zag2)">
									Овечка @{{n}}
								</p> 								
								
							
							</div>
						</div>
						<div class="col-lg-3 zgz">
							<h4>Загон 3</h4>
							<div class="zag-cont">
								<p v-if="sheeps.zag3!=0" v-for="n in parseInt(sheeps.zag3)">
									Овечка @{{n}}
								</p> 
							
							</div>
						
						</div>
						<div class="col-lg-3 zgz">
							<h4>Загон 4</h4>
							<div class="zag-cont">
								<p v-if="sheeps.zag4!=0" v-for="n in parseInt(sheeps.zag4)">
									Овечка @{{n}}
								</p> 
							
							</div>
						
						</div>
					</div>
					<div class="row">
						<div class="col-lg-12">
							<div class="shcetchik">
								<span><b>День</b>: @{{day}}</span>
								
								<span style="float: right; font-weight:bold; margin-right:10px;" v-if="show!=0" v-html="show"> 
									  
								</span> 
								
								
								
							</div>
						</div>
						<div class="col-lg-6">
							<br/>
							<div class="hist-cont">
							<h3>История</h3>
							
						   
								<table class="table">
									<thead>
										<tr>
											<th>День</th>
											<th>Загон №</th>
											<th></th>
											<th></th>
										</tr>
									</thead>
									<tbody>
										<tr v-if="history.length" v-for="item in history">
											<td>@{{item.day}}</td>
											<td>@{{item.zagid}}</td>
											<td>1 овечка</td>
											<td v-if="item.type=='add'" >Добавлено</td>
											<td v-else-if="item.type=='delete'" >Удалено</td>   
										
										</tr>   
									</tbody>
									
									
								</table>
						
						   </div>
						</div>
						<div class="col-lg-6">
							<br/>
							<div class="hist-cont">
								<h3>Отчеты</h3>
								<div><b>день:</b> <span>0</span> - <span>@{{interval}}</span></div>
								<input class="form-control" @change="otchets" v-model="interval" type="range" name="points" min="0" :max="day"> 
								<br/>
								
								 <div><b>общее количество овечек</b> : @{{otchet.allsheep}}</div>
								 <div><b>количество убитых овечек</b> : @{{otchet.killedsheep}}</div>
								 <div><b>количество живых овечек</b> : @{{otchet.allsheep-otchet.killedsheep}}</div>
								 <div><b>заг 1</b> : @{{otchet.zag1}}</div>
								 <div><b>заг 2</b> : @{{otchet.zag2}}</div>
								 <div><b>заг 3</b> : @{{otchet.zag3}}</div>
								 <div><b>заг 4</b> : @{{otchet.zag4}}</div>  
							
							</div>
						</div>
					</div>
			</div>
		</section>
		<script>

			window.onload = function () {

				const  main = new Vue({
							 el: '#app',
							 data: {
									sheeps:{
										zag1:0,
										zag2:0,
										zag3:0,
										zag4:0,
								    },
									day:0, 
									localcount:0,
									show:0, 
									history:0,
									interval:0,
									otchet:{
										allsheep:0,
										killedsheep:0,
										livesheep:0,
										zag1:0,
										zag2:0,
										zag3:0,
										zag4:0,
										
									} 
									
							 },
							 methods:{
								 getDay(){ 
									 var self =this;
									  axios.get('/api/getDay').then(res=>{
										  if(res.data>0){
											  self.day = res.data;
											  self.interval = res.data;
											  self.otchets(); 
										  }  
										  
										  console.log(res.data);  
										  
									  }); 


									  
								 },								 
								 otchets(){
									 var self =this;
									 let data = {
										 day:this.interval
									 } 
									 axios.post('/api/otchets',data).then(res=>{
											self.otchet = res.data; 
									});  
										 
								 }, 
								 getSheeps(){
									
									  var self =this;
									  axios.get('/api/sheeps').then(res=>{
										  
									   for(var i=0; i<res.data.length; i++){
										   if(res.data[i].zag ==1){
											  self.sheeps.zag1 =res.data[i].count;  
										   }else if(res.data[i].zag ==2){
											   self.sheeps.zag2 =res.data[i].count;
										   }else if(res.data[i].zag ==3){
											   self.sheeps.zag3 =res.data[i].count;
										   }else{
											   
											   self.sheeps.zag4 =res.data[i].count;
										   }
									   }
									   
									  
										  
									  });
									  
									  setInterval(this.addOvechka, 10000)
								 },
								
								 addOvechka(){
									 this.localcount++;	
									 
									 this.day++;
									 
									 var rand = Math.floor(Math.random() * 4);
									 let zagid;
									 
									 if(rand ==0){
										 zagid=1;
									 }else if(rand ==1){
										 zagid=2;
									 }
									 else if(rand ==2){ 
										 zagid=3;
									 }else if(rand ==3){
										 zagid=4;
									 }
									 if(this.day % 10 == 0){
										 
										 var data = {
											 day:this.day,
											 zagid:zagid,
											 count:1,
											 type:'delete'
										}  
										this.show = 'Удалено из загона '+zagid; 
										
										this.localcount = 0;
										
										
										
										
									 }else{
										 var data = {
										 day:this.day,
										 zagid:zagid,
										 count:1,
									     type:'add'
										} 
										
										this.show = 'Добавлено в загон '+zagid; 
										 
									 }      
									 
									 this.interval = this.day;  
									 
									 var self =this;
									 axios.post('/api/zagonlogstore',data).then(res=>{
										console.log(res);
										for(var i=0; i<res.data.length; i++){
										   if(res.data[i].zag ==1){
											  self.sheeps.zag1 =res.data[i].count;  
										   }else if(res.data[i].zag ==2){
											   self.sheeps.zag2 =res.data[i].count;
										   }else if(res.data[i].zag ==3){
											   self.sheeps.zag3 =res.data[i].count;
										   }else{
											   
											   self.sheeps.zag4 =res.data[i].count;
										   }
									     }
										 self.getHistory();
										 self.otchets();
									   }); 
									   
									   
									 
									 
								 },
								 getHistory(){
									 var self =this;
									 axios.get('/api/getHistory').then(res=>{
										 
										self.history = res.data.data;
										
								     });   
									 
								 }
							 },
							 beforeMount:function(){	
							      this.getSheeps();
							      this.getDay();
								  this.getHistory();      
									 
							 }
							
					
					 });
					 
					
				
			}

		</script>
    </body>
</html>
