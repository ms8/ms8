!function ($) {
    var ImagePre = function (element, options) {
        this.$element = $(element);
        this.$input = this.$element.find(':file');
        if(options.name){
            this.$input.attr('name',options.name);
            this.name = options.name;
        }else{
            this.name = this.$input.attr('name')
        }

        /*if(options.checkBoxName){
            this.checkBoxName = options.checkBoxName;
        }else{
            this.checkBoxName = this.name+'_isRemoved';
        }
        this.$checkBox = this.$element.find('input[type="checkbox"][name="' + this.checkBoxName +'"]');
        if (this.$checkBox.length == 0) {
            this.$checkBox = $('<input name="' +this.checkBoxName + '" type="checkbox"/>');
            this.$input.after(this.$checkBox);
        }
        */
        this.$preview = this.$element.find('.imagePreview');

        this.$remove = this.$element.find('[data-dismiss="imagePre"]');

        this.blank = "data:image/gif;base64,R0lGODlhAQABAIAAAP///////yH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==";
        this.init();
        this.listen();
    }
    ImagePre.prototype = { //原型
        init:function () {
            var element = this.$element;
            element.find('.imagePre-exists').addClass('hide');
            element.find('.imagePre-new').removeClass('hide');
        },
        listen:function () {
            this.$input.on('change.imagePre', $.proxy(this.change, this));
            $(this.$input[0].form).on('reset.imagePre', $.proxy(this.clear, this));//监听form reset
            if (this.$remove) this.$remove.on('click.imagePre', $.proxy(this.clear, this));
        },
        change:function (e, invoked) {
            if (invoked === 'clear') return;
            if (window.File && window.FileReader && window.FileList && window.Blob) {

            } else {
                alert('The File APIs are not fully supported in this browser.');
                return;
            }
            var file = e.target.files !== undefined ? e.target.files[0] : (e.target.value ? { name:e.target.value.replace(/^.+\\/, '') } : null)

            if (!file) {
                this.clear();
                return
            }
            this.$input.attr('name', this.name);

            var path = file.value;
            if (isValidImage(path)) {
                var preview = this.$preview;
                var element = this.$element;
                var render = new FileReader();
                render.onload = function (e) {
                    preview.attr('src', e.target.result);
                };
                render.readAsDataURL(file);
                element.find('.imagePre-exists').removeClass('hide');
                element.find('.imagePre-new').addClass('hide');
                //this.$checkBox.attr('checked',false);
            } else {
                alert('The Image must be gif/png/jpg/jpeg');
                return;
            }

            function isValidImage(image) {
                function isValid(text) {
                    if (text == null || text.trim() == "") {
                        return false;
                    }
                    return true;
                }
                if (isValid(image)) {
                    var ext = image.split('.').pop().toLowerCase();
                    return $.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) != -1;
                } else {
                    return true;
                }
            }
        },
        clear:function (e) {
            this.$input.attr('name','');
            //ie8+ doesn't support changing the value of input with type=file so clone instead
            if (navigator.userAgent.match(/msie/i)){
                var inputClone = this.$input.clone(true);
                this.$input.after(inputClone);
                this.$input.remove();
                this.$input = inputClone;
            }else{
                this.$input.val('')
            }
            this.$preview.attr('src',this.blank);
            this.$checkBox.attr('checked',true);
            var element = this.$element;
            element.find('.imagePre-exists').addClass('hide');
            element.find('.imagePre-new').removeClass('hide');
            if(e){
                //主动 过滤clear变化的 change
                this.$input.trigger('change', ['clear']);
                e.preventDefault();
            }
        }
    }

    $.fn.imagePre = function(options){
        return this.each(function () {
            var $this = $(this)
                , data = $this.data('imagePre')
            if (!data) $this.data('imagePre', (data = new ImagePre(this, options)))
            if (typeof options == 'string') data[options]();
        })
    }
    $.fn.imagePre.Constructor = ImagePre; //继承原型属性
}(window.jQuery);
