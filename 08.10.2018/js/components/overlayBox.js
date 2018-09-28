var Box = {
    boxWrapper: $('main'),
    init:function(){
        var box = Object.assign(Object.create(box), this);
        box.render();
        alert('rendered');
    },
    render: function(){
        var box = this;
        var element = '<div class="overlayBox">'+
                        '<div class="overlayBoxSettingsBtn">hi</div>'+
                    '</div>';
        if(this.element){
            this.element = element.replaceAll(this.element);
        }
        else{
            this.element = element.appendTo(this.boxWrapper);
        }
        box.listeners();
    },
    listeners:function(){
        var box = this.element;
        box.on('click', function(){
            
        });
    }
}