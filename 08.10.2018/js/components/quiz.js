var quiz = {
    wrapper: $('.item-wrap'),
    init:function(){

    },
    render:function(){
        var element =$( '<div class="quizWrap">'+
                            '<h1>title</h1>'+
                            '<img src="img/" />'+
                            '<div class="question">'+
                                '<h2>quiz question</h2>'+
                            '</div>'+
                            '<div class="choiceWrap">'+
                                
                            '</div>'+
                        '</div>');
        if(this.element){
            this.element = this.element.replaceAll(this.element);
        }
        else{
            this.element = this.element.AppendTo(this.wrapper);
        }
        this.listeners();
    },
    listeners:function(){
        var quiz = this;
        

    }
}