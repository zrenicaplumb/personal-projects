 var Music = {
 	wrapper: $('.musicWrap'),
 	init:function(music){
		 music = Object.assign(Object.create(this), music);
		 console.log(music);
		music.render();
	
		return music;
		 
 	},
 	render:function(){
 		
 		var element = $('<div class="col-xs-12 col-sm-4 col-md-3">'+
							'<div>'+
								"Name: "+this.title+"<br/>"+
								'<label>Name: </label> <input type="text" name="title" value="'+this.title+'">'+
								'<img class="gallery-img" src=img/'+this.image+'>'+
							'</div>'+
							'<button class="deleteMusicBtn">Delete</button>'+
						'</div>');
 		if(this.element){
 			this.element = element.replaceAll(this.element);
 		} else {
 			this.element = element.appendTo(this.wrapper);
 		}
 		this.listeners();
 	},
 	listeners:function(){
		
 		var music = this;
		 
 		this.element.find('img').on('click', function(){
			
 			music.showDetails();
 		});

 		this.element.find('input[name="title"]').on('change', function(){
 			// console.log( $(this).val());
 			var title = $(this).val();
 			music.update({title: title});
 		});

 		this.element.find('.deleteMusicBtn').on("click", function(){
 			music.delete();
 		});
 	},
 	delete:function(){
 		var music = this;
 		$.ajax({
 			url: 'api.php',
 			data: {method: 'deleteMusic', id: this.id},
 			dataType: 'json',
 			success:function(result){
 				console.log(result);
 				music.element.remove();
 			},
 		});
 	},
 	update:function(settings){
 		var music = this;
 		Object.assign(music, settings);
 		$.ajax({
 			url: 'api.php',
 			data: {method: 'updateMusic', id: this.id, settings: settings},
 			dataType: 'json',
 			success:function(result){
 				console.log(result);
 				music.render();
 			},
 		});
 	},
 	showDetails:function(){
 		var music = this;
 		var detailsElement = "";
 		var props = ["id", "genre", "artist", "title", "image"];
 		props.forEach(function(prop){
 			detailsElement+=(prop+":"+music[prop]);
 		});
 		alert(detailsElement);
 	},
 }
