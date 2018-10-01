var Box = {
    boxWrapper: $('main'),
    init:function(box, settings){
        var box = Object.assign(Object.create(this), box);
        box_left = settings.left;
        box_bottom = settings.bottom;
        background_color = settings.background_color;
        box_width = settings.width;
        box_height = settings.height;
        console.log(box.settings);
        box.render();
        return box;
    },
    render: function(){
        
        var element = $('<div class="overlayBox">'+
                            '<div class="overlayBoxSettingsBtn">Settings</div>'+
                            '<input type="/>'+
                        '</div>');
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
                                    '<input type="" class="heightInput" placeholder="Box Height"/>'+
                                    '<input type="" class="widthInput" placeholder="Box Width"/>'+
                                    '<input type="" class="colorInput" placeholder="Background Color"/>'+
                                    '<button type="" class="settingsCloseBtn" >Close</button>'+
                                '</div>');
        if(this.settingsElement){
            this.settingsElement = settingsElement.replaceAll(this.settingsElement);
        }
        else{
            this.settingsElement = settingsElement.appendTo(this.boxWrapper);
        }
        

        $('.settingsCloseBtn').on('click', function(){
            var box_height = settingsElement.find('.heightInput').val();
            var box_width = settingsElement.find('.widthInput').val();
            var background_color = settingsElement.find('.colorInput').val();
            var settings = {
                box_width: box_width,
                box_height: box_height,
                background_color: background_color
            }
            box.settingsElement.hide();
            box.update(settings);
        });
    },
    listeners:function(){
        var box = this;
         this.element.find('.overlayBoxSettingsBtn').on('click', function(){
            box.renderSettings();
            box.settingsElement.show();
        });
    },
    update:function(settings){
        var box = this;
        console.log(settings);
        $.post('api.php', settings, function(result){
            if(result.status == 'success'){
                $.each(settings, function(property, value){
					box[property] = value;
                });
                box.render();
            }
        },'json');
    }
}