'use strict';

window._ = require('underscore');

// Core functions
var KB = {

    onResize: [],
    onScroll: [],

    /**
     * Executes controllers and their actions
     */
    exec: function(controller, action) {

        var action = (action === undefined) ? '_construct' : action,
            ns = window[controller];

        if (ns !== undefined && typeof ns[action] == "function") {
            ns[action]();
        }
    },

    /**
     * Inits the KB superpower!
     */
    init: function() {
        var body = document.body,
            controller = body.getAttribute('data-controller'),
            action = body.getAttribute('data-action');

        // Execute controllers
        this.exec(controller);
        this.exec(controller, action);

        this.initPageLoad();
    },

    initPageLoad: function() {
        // Execute data inits
        this.executeDataInits();

        // Execute data scope constructors
        this.executeScopes();
    },

    /**
     * Executes functions within [data-init] on pageload.
     */
    executeDataInits: function(container) {
        var container = container || document.body,
            self = this;

        // Loop through all elements that we find, and execute
        _.each(container.querySelectorAll('[data-init]'), function(el) {
            self.evaluateFunctionOnElement(el, el.getAttribute('data-init'));
        });
    },


    executeScopes: function(container) {
        var container = container || document.body,
            self = this;

        // Run controller constructors on the scopes.
        _.each(container.querySelectorAll('[data-scope]'), function(el) {
            var scope = el.getAttribute('data-scope');

            var params = [];
            params.push(el);

            window[scope]["_construct"].apply(window[scope], params);
        });
    },

    /**
     * Evaluates a function on the element and
     * traverses the DOM for scopes if found.
     */
    evaluateFunctionOnElement: function(el, func) {
        var scope = '';

        // Check if we can find a local scope
        if (func.indexOf('.') !== 0) {
            // Let's traverse the DOM
            var parent = el.parentNode;

            do {
                // If we reach body, global scope is used.
                if (parent.tagName == 'HTML') break;

                // We found a match
                if (parent.hasAttribute('data-scope')) {
                    scope = parent.getAttribute('data-scope') + '.';
                    break;
                }
            } while (parent = parent.parentNode);
        } else {
            func = func.substr(1);
        }

        var tmpFunc = scope + func;

        // First we grab everything except the paramters
        var functionString = tmpFunc.substr(0, tmpFunc.indexOf('('));

        // We split the function string to namespaces
        var namespaces = functionString.split('.');

        // Let's remove everything before the first paranthese
        tmpFunc = tmpFunc.substr(tmpFunc.indexOf('(') + 1);

        // Let's remove the last parantheses
        tmpFunc = tmpFunc.substr(0, tmpFunc.length - 1);

        // Let's split up the params
        var params = tmpFunc.split(',');

        // Empty check.
        if (params.length == 1 && params[0] == '') {
            params = [];
        }

        // Always push the clicked element as a last paramater
        params.push(el);

        // Let's hook up our context with the namespaces
        var context = window;

        for (var i = 0; i < namespaces.length; i++) {
            context = context[namespaces[i]];
        }

        if (typeof context === 'undefined') {
            console.log('Function does not exist.');
            return false;
        }

        // Run forrest, run!
        if (!params.length) {
            context(el);
        } else {
            context.apply(window[namespaces.shift(1)], params);
        }
    },

    isValidJson: function(json) {
        try {
            JSON.parse(json);
        } catch (e) {
            return false;
        }
        return true;
    },

    isMobile : function() {
        return window.innerWidth <= 768;
    }
}

// Global click handler
document.addEventListener('click', function(e) {

    var target = null;

    // If the clicked target is not an link
    if ($(e.target)[0].tagName != 'A') {
        if ($(e.target).attr('data-function')) {
            target = e.target;
        } else {
            if ($(e.target).closest('a').length > 0) {
                target = $(e.target).closest('a')[0];
            }
        }
    } else {
        target = e.target;
    }

    // Evaluates functions on click.
    if (target !== null && target.hasAttribute('data-function')) {
        KB.evaluateFunctionOnElement(target, target.getAttribute('data-function'));
        e.preventDefault();
        return false;
    }
});

// Global resize and handler
var resizeTimer = null,
    scrollTimer = null,
    windowWidth = $(window).width();

window.onresize = function(e) {

    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(function() {
        if ($(window).width() == windowWidth) return false;

        windowWidth = $(window).width();

        if (KB.onResize.length > 0) {
            _.each(KB.onResize, function(func) {
                eval(func);
            });
        }
    }, 100);
}

window.onscroll = function(e) {
    clearTimeout(scrollTimer);
    scrollTimer = setTimeout(function() {
        if (KB.onScroll.length > 0) {
            _.each(KB.onScroll, function(func) {
                eval(func);
            });
        }
    }, 100);
};

module.exports = KB;
