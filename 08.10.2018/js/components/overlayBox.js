var Box = {
    boxWrapper: $('main'),
    init:function(box){
        var box = Object.assign(Object.create(this), box);
        box.render();
        return box;
    },
    render: function(){
        
        var element = $('<div class="overlayBox">'+
                            '<div class="overlayBoxSettingsBtn">hi</div>'+
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
    listeners:function(){
        var box = this;
        var settings;
        box.element.find('.overlayBoxSettingsBtn').on('click', function(){
            alert('clicked');
        });
        box.element.find('input').on('change', function(){
            box.updateSettings(settings);
        });
        // box.element.draggable();
    },
    updateSettings:function(settings){
        // $.post('api.php', method:);
    }
}