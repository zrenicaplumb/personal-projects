var Box = {
    boxWrapper: $('main'),
    init:function(box){
        box = Object.assign(Object.create(this), box);
        
        box.render();
        return box;
    },
    create:function(box){
        var settings = Object.assign({ 
            box_left: 50,
            box_bottom : 50,
            box_width : 150,
            box_height : 150,
            background_color : 'gray'
        }, box);
        box = Object.assign(Object.create(this), settings);
        $.ajax({
            type:'post',
            url:'api.php',
            dataType:'json',
            data:{
                method:'createOverlayBox',
                settings:settings  
            },
            success:function(result){
                if(result == "success"){
                    box.box_id = result.data.box_id;
                    box.render();
                }
            }
        });
        return box;
    },
    render: function(){
        
        var element = $('<div class="overlayBox">'+
                            '<div class="overlayBoxSettingsBtn">Settings</div>'+
                            '<input type="/>'+
                        '</div>');
        element.css({
            left:this.box_left+'px',
            bottom:this.box_bottom+'px',
            width:this.box_width,
            height:this.box_height,
            background_color:this.background_color
            
        });
        
        if(this.element){
            this.element = element.replaceAll(this.element);
        }
        else{
            this.element = element.appendTo(this.boxWrapper);
        }
        this.listeners();
    },
    renderSettings:function(){
        var box = this;
        var settingsElement = $('<div class="settingsElement">'+
                                    '<p class="">Settings</p>'+
                                    '<div class=""></div>'+
                                    '<input type="" class="boxLeft" placeholder="Box X-axis"/>'+
                                    '<input type="" class="boxBottom" placeholder="Box Y-axis"/>'+
                                    '<input type="" class="heightInput" placeholder="Box Height"/>'+
                                    '<input type="" class="widthInput" placeholder="Box Width"/>'+
                                    '<input type="" class="colorInput" placeholder="Background Color"/>'+
                                    '<button type="" class="overlayBoxDeleteBtn" >Delete</button>'+
                                    '<button type="" class="settingsCloseBtn">Close</button>'+
                                    
                                '</div>');
        if(this.settingsElement){
            this.settingsElement = settingsElement.replaceAll(this.settingsElement);
        }
        else{
            this.settingsElement = settingsElement.appendTo(this.element);
        }
        

        $('.settingsCloseBtn').on('click', function(){
            
            var box_left = settingsElement.find('.boxLeft').val();
            var box_bottom = settingsElement.find('.boxBottom').val();
            var box_height = settingsElement.find('.heightInput').val();
            var box_width = settingsElement.find('.widthInput').val();
            var background_color = settingsElement.find('.colorInput').val();
            
            
            var settings = {
                box_id: box.box_id,
                box_bottom: box_bottom,
                box_left: box_left,
                box_width: box_width,
                box_height: box_height,
                background_color: background_color
            }
            box.settingsElement.hide();
            box.update(settings, true);
        });

        $('.overlayBoxDeleteBtn').on('click', function(){
            
            box.delete();
            
        });

    },
    delete:function(){
        var box = this;
        console.log('delete function fired');
        console.log(box.box_id);
        $.ajax({
            url:'api.php',
            dataType:'json',
            data:{
                method:'deleteOverlayBox',
                id: box.box_id,
        
            },
            success:function(result){
                if(result.status == 'success'){
                    console.log('hi');
                    box.element.remove();
                }
            }
        });
    },
    listeners:function(){
        var box = this;
         this.element.find('.overlayBoxSettingsBtn').on('click', function(){
            box.renderSettings();
            box.settingsElement.show();
        });
        // console.log(box);
        box.element.draggable({
            containment:box.boxWrapper
        });
    },
    update:function(settings, rerender){
        var box = this;
        
        $.ajax({
            url:'api.php',
            dataType:'json',
            data:{
                method:'updateOverlayBox',
                settings: settings
            },
            success:function(result){
                if(result.status == 'success'){
                    console.log('box updated');
                    $.each(settings, function(property, value){
                        box[property] = value;
                    });
                    if(rerender){
                        
                        box.render();
                        box.renderSettings();
                    }
                    
                }
            }
        });
    }
}