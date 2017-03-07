
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-93188129-1', 'auto');
ga('send', 'pageview');

var Focus = Class.create({
    initialize: function() {
        this.initialized = false;
        Event.observe(window, 'load', this.onload.bindAsEventListener(this));
    },
    onload: function() {
        this.focusElements = $$('a', 'input[type="button"]');
        //this.focusElements=$$('a','span[id="button"]');
        this.focusedElement = 0;
        document.observe('keydown', this.onkeydown.bindAsEventListener(this));
        if (this.focusElements.length == 0) {
            return;
        }
        this.focusElement(0);
        this.initialized = true;
    },
    markElementFocused: function(element) {
        $(element).addClassName("focused");
    },
    markElementUnfocused: function(element) {
        $(element).removeClassName("focused");
    },
    getFocusedElement: function() {
        return this.focusElements[this.focusedElement];
    },
    focusElement: function(elementNumber) {
        this.markElementUnfocused(this.getFocusedElement());
        if (elementNumber >= this.focusElements.length)
            elementNumber = 0;
        if (elementNumber < 0)
            elementNumber = this.focusElements.length - 1;
        this.focusedElement = elementNumber;
        this.markElementFocused(this.getFocusedElement());
    },
    focusNext: function() {
        this.focusElement(this.focusedElement + 1);
    },
    focusPrev: function() {
        this.focusElement(this.focusedElement - 1);
    },
    click: function() {
        var focusedElement = this.getFocusedElement();
        if (focusedElement.tagName == 'A') {
            if (!((focusedElement.onclick) && (!focusedElement.onclick()))) {
                location.href = focusedElement.href;
            }
        } else {
            focusedElement.click();
        }
    },
    onkeydown: function(event) {
        switch (event.keyCode || event.which) {
        case Event.KEY_RETURN:
            this.click();
            Event.stop(event);
            break;
        case Event.KEY_RIGHT:
        case Event.KEY_TAB:
            this.focusNext();
            break;
        case Event.KEY_LEFT:
            this.focusPrev();
            break;
        case VK_BACK:
        case VK_BACK_SPACE:
            break;
        case VK_RED:
        case VK_R:
            window.location.reload();
            break;
        default:
            break;
        }
    }
});

new Focus();

document.write('<div style="position:absolute; top:5%; right:5%; font-size:24px; color:red; border-style:dotted;">\
<span onclick="javascript:window.location.reload();">Reload</span>  |   \
<span onclick="javascript:window.history.back();">Back</span></div>');
