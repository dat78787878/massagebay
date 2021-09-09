var TECH5S_SEARCH = function($){
    var NAME = 'TECH5S_SEARCH';
    var SELECTOR = {
        INPUT :'._tech5s_search_input',
        RESULT :'._tech5s_search_result',
        SPINNER :'._tech5s_search_spinner',
    };
    var JQUERY_NO_CONFLICT = $.fn[NAME];
    var DEFAULT = {delay:300};
    var TECH5S_SEARCH = function(){
        var getAuto = null;
        function TECH5S_SEARCH(element,config){
            this._config = config;
            this._element = element;
            this.init();
        }
        TECH5S_SEARCH.prototype.callSubFunction = function(str,response,element){
            var temp = str.split('.');
            if(temp.length==1){
                var fnc = temp[0];
                if(window[fnc]!=undefined && typeof window[fnc] === 'function'){
                    window[fnc](response,element);
                }
            }
            else if(temp.length==2){
                var obj = temp[0];
                var fnc = temp[1];
                if(window[obj]!=undefined && typeof window[obj] == 'object'){
                    if(window[obj][fnc]!=undefined && typeof window[obj][fnc] === 'function'){
                        window[obj][fnc](response,element);
                    }   
                }
            }
        }
        TECH5S_SEARCH.prototype.init = function(){
            var _this = this;
            var input = _this._element.find(SELECTOR.INPUT);
            var action = _this._element.attr('action');
           
            var resultbox = _this._element.find(SELECTOR.RESULT);
            var spinner = _this._element.find(SELECTOR.SPINNER);
            input.on('input', function(event) {
                var data = _this._element.serialize();
                event.preventDefault();
                var val = $(input).val();
                clearTimeout(_this.getAuto);
                resultbox.html('');
                if (val != '') {
                    spinner.show();
                    resultbox.show();
                }
                _this.getAuto = setTimeout(function(){ 
                    if (val == "") {
                        resultbox.hide();
                    }else {
                        $.ajax({
                            url: action,
                            type: 'GET',
                            global: false,
                            data: data,
                        })
                        .done(function(data) {
                            spinner.hide();
                            resultbox.html(data);
                            var donefnc = _this._config['done'];
                            if(donefnc!=undefined){
                                _this.callSubFunction(donefnc);
                            }
                        })
                    };
                },_this._config['delay']);
            });
        }
        TECH5S_SEARCH._jQueryInterface = function _jQueryInterface() {
            return this.each(function () {
              var _options = $.extend({}, DEFAULT, $(this).data());
              var toast = new TECH5S_SEARCH($(this), _options);
            });
        };
        return TECH5S_SEARCH;
    }();
    $.fn[NAME] = TECH5S_SEARCH._jQueryInterface;
    $.fn[NAME].Constructor = TECH5S_SEARCH;
    $.fn[NAME].noConflict = function () {
        $.fn[NAME] = JQUERY_NO_CONFLICT;
        return TECH5S_SEARCH._jQueryInterface;
    };
    return TECH5S_SEARCH;
}(jQuery);