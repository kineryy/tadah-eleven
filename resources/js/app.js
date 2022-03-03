//require('./bootstrap');

; /// files: roblox.js, jquery.json-2.2.js, jquery.simplemodal-1.3.5.js, jquery.tipsy.js, AjaxAvatarThumbnail.js, extensions/string.js, StringTruncator.min.js, json2.min.js, webkit.js, GoogleAnalytics/GoogleAnalyticsEvents.js, MasterPageUI.js, jquery.cookie.js, jquery.jsoncookie.js, XsrfToken.js, RobloxEventManager.js, RobloxEventListener.js, KontagentEventListener.js, GoogleEventListener.js, MongoEventListener.js, SearchVisionListener.js, SiteTouchEvent.js, JSErrorTracker.js, Studio2Alert.js, ClientInstaller.js, InstallationInstructions.js, MadStatus.js, PlaceLauncher.js, VideoPreRoll.js

; /// roblox.js
(function(n, t) {
    function p(n, i) {
        var r = i.split(".");
        for (i = r.shift(); r.length > 0; n = n[i], i = r.shift())
            if (n[i] === t) return t;
        return n[i]
    }

    function k(n, i, r) {
        var u = i.split(".");
        for (i = u.shift(); u.length > 0; n = n[i], i = u.shift()) n[i] === t && (n[i] = {});
        n[i] = r
    }

    function nt(n, t) {
        var i = f.createElement("link");
        i.href = n, i.rel = "stylesheet", i.type = "text/css", u.parentNode.insertBefore(i, u), t()
    }

    function g(n, t) {
        var i = f.createElement("script");
        i.type = "text/javascript", i.src = n, i.onload = i.onreadystatechange = function() {
            i.readyState && i.readyState != "loaded" && i.readyState != "complete" || (t(), i.onload = i.onreadystatechange = null)
        }, u.parentNode.insertBefore(i, u)
    }

    function d(n) {
        return n.split(".").pop().split("?").shift()
    }

    function o(n) {
        return n.indexOf(".js") < 0 ? n : n.indexOf(r.modulePath) >= 0 ? n.split(r.modulePath).pop().split(".js").shift().replace("/", ".") : n
    }

    function v(n) {
        var t, i;
        return t = n.indexOf(".js") >= 0 || n.indexOf(".css") >= 0 ? n : r.baseUrl + r.modulePath + n.replace(".", "/") + ".js", i = r.versions[t] || 1, t + "?v=" + i
    }

    function s(n) {
        for (var r, u = [], i = 0; i < n.length; i++) r = p(Roblox, o(n[i])), r !== t && u.push(r);
        return u
    }

    function e(n) {
        var t = i[n];
        if (t.loaded && t.depsLoaded)
            while (t.listeners.length > 0) t.listeners.shift()()
    }

    function a(n, u) {
        var f, s, h;
        if (!b(n) || r.externalResources.toString().indexOf(n) >= 0) return u();
        f = o(n), i[f] === t ? (i[f] = {
            loaded: !1,
            depsLoaded: !0,
            listeners: []
        }, i[f].listeners.push(u), s = v(f), h = d(s) == "css" ? nt : g, h(s, function() {
            i[f].loaded = !0, e(f)
        })) : (i[f].listeners.push(u), e(f))
    }

    function h(n, t) {
        var r = n.shift(),
            i = n.length == 0 ? t : function() {
                h(n, t)
            };
        a(r, i)
    }

    function l(n, t) {
        c(n) || (n = [n]);
        var i = function() {
            t.apply(null, s(n))
        };
        h(n.slice(0), i)
    }

    function y(n, t, r) {
        w(t) ? (r = t, t = []) : c(t) || (t = [t]), i[n] = i[n] || {
            loaded: !0,
            listeners: []
        }, i[n].depsLoaded = !1, i[n].listeners.unshift(function() {
            k(Roblox, n, r.apply(null, s(t)))
        }), l(t, function() {
            i[n].depsLoaded = !0, e(n)
        })
    }
    var f = n.document,
        u = f.getElementsByTagName("script")[0],
        b = function(n) {
            return typeof n == "string"
        },
        c = function(n) {
            return Object.prototype.toString.call(n) == "[object Array]"
        },
        w = function(n) {
            return Object.prototype.toString.call(n) == "[object Function]"
        },
        i = {},
        r = {
            baseUrl: "/",
            modulePath: "js/modules/",
            versions: {},
            externalResources: []
        };
    typeof Roblox == "undefined" && (Roblox = {}), Roblox.config = r, Roblox.require = l, Roblox.define = y
})(window);

; /// jquery.json-2.2.js
(function(n) {
    n.toJSON = function(t) {
        var s, o, p, h, f, e, r, v, c, a, u, l, i, y;
        if (typeof JSON == "object" && JSON.stringify) return JSON.stringify(t);
        if (i = typeof t, t === null) return "null";
        if (i == "undefined") return undefined;
        if (i == "number" || i == "boolean") return t + "";
        if (i == "string") return n.quoteString(t);
        if (i == "object") {
            if (typeof t.toJSON == "function") return n.toJSON(t.toJSON());
            if (t.constructor === Date) return s = t.getUTCMonth() + 1, s < 10 && (s = "0" + s), o = t.getUTCDate(), o < 10 && (o = "0" + o), p = t.getUTCFullYear(), h = t.getUTCHours(), h < 10 && (h = "0" + h), f = t.getUTCMinutes(), f < 10 && (f = "0" + f), e = t.getUTCSeconds(), e < 10 && (e = "0" + e), r = t.getUTCMilliseconds(), r < 100 && (r = "0" + r), r < 10 && (r = "0" + r), '"' + p + "-" + s + "-" + o + "T" + h + ":" + f + ":" + e + "." + r + 'Z"';
            if (t.constructor === Array) {
                for (v = [], c = 0; c < t.length; c++) v.push(n.toJSON(t[c]) || "null");
                return "[" + v.join(",") + "]"
            }
            a = [];
            for (u in t) {
                if (i = typeof u, i == "number") l = '"' + u + '"';
                else if (i == "string") l = n.quoteString(u);
                else continue;
                typeof t[u] != "function" && (y = n.toJSON(t[u]), a.push(l + ":" + y))
            }
            return "{" + a.join(", ") + "}"
        }
    }, n.evalJSON = function(n) {
        return typeof JSON == "object" && JSON.parse ? JSON.parse(n) : eval("(" + n + ")")
    }, n.secureEvalJSON = function(n) {
        if (typeof JSON == "object" && JSON.parse) return JSON.parse(n);
        var t = n;
        if (t = t.replace(/\\["\\\/bfnrtu]/g, "@"), t = t.replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]"), t = t.replace(/(?:^|:|,)(?:\s*\[)+/g, ""), /^[\],:{}\s]*$/.test(t)) return eval("(" + n + ")");
        throw new SyntaxError("Error parsing JSON, source is not valid.");
    }, n.quoteString = function(n) {
        return n.match(t) ? '"' + n.replace(t, function(n) {
            var t = i[n];
            return typeof t == "string" ? t : (t = n.charCodeAt(), "\\u00" + Math.floor(t / 16).toString(16) + (t % 16).toString(16))
        }) + '"' : '"' + n + '"'
    };
    var t = /["\\\x00-\x1f\x7f-\x9f]/g,
        i = {
            "\b": "\\b",
            "\t": "\\t",
            "\n": "\\n",
            "\f": "\\f",
            "\r": "\\r",
            '"': '\\"',
            "\\": "\\\\"
        }
})(jQuery);

; /// jquery.simplemodal-1.3.5.js
(function(n) {
    var i = n.browser.msie && parseInt(n.browser.version) == 6 && typeof window.XMLHttpRequest != "object",
        r = !1,
        t = [];
    n.modal = function(t, i) {
        return n.modal.impl.init(t, i)
    }, n.modal.close = function() {
        n.modal.impl.close()
    }, n.fn.modal = function(t) {
        return n.modal.impl.init(this, t)
    }, n.modal.defaults = {
        appendTo: "body",
        focus: !0,
        opacity: 50,
        overlayId: "simplemodal-overlay",
        overlayCss: {},
        containerId: "simplemodal-container",
        containerCss: {},
        dataId: "simplemodal-data",
        dataCss: {},
        minHeight: null,
        minWidth: null,
        maxHeight: null,
        maxWidth: null,
        autoResize: !1,
        autoPosition: !0,
        zIndex: 1e3,
        close: !0,
        closeHTML: '<a class="modalCloseImg" title="Close"></a>',
        closeClass: "simplemodal-close",
        escClose: !0,
        overlayClose: !1,
        position: null,
        persist: !1,
        modal: !0,
        onOpen: null,
        onShow: null,
        onClose: null
    }, n.modal.impl = {
        o: null,
        d: {},
        init: function(t, i) {
            var r = this;
            if (r.d.data) return !1;
            if (r.o = n.extend({}, n.modal.defaults, i), r.zIndex = r.o.zIndex, r.occb = !1, typeof t == "object") t = t instanceof jQuery ? t : n(t), r.d.placeholder = !1, t.parent().parent().size() > 0 && (t.before(n("<span></span>").attr("id", "simplemodal-placeholder").css({
                display: "none"
            })), r.d.placeholder = !0, r.display = t.css("display"), r.o.persist || (r.d.orig = t.clone(!0)));
            else if (typeof t == "string" || typeof t == "number") t = n("<div></div>").html(t);
            else return alert("SimpleModal Error: Unsupported data type: " + typeof t), r;
            return r.create(t), t = null, r.open(), n.isFunction(r.o.onShow) && r.o.onShow.apply(r, [r.d]), r
        },
        create: function(r) {
            var u = this;
            t = u.getDimensions(), u.o.modal && i && (u.d.iframe = n('<iframe src="javascript:false;"></iframe>').css(n.extend(u.o.iframeCss, {
                display: "none",
                opacity: 0,
                position: "fixed",
                height: t[0],
                width: t[1],
                zIndex: u.o.zIndex,
                top: 0,
                left: 0
            })).appendTo(u.o.appendTo)), u.d.overlay = n("<div></div>").attr("id", u.o.overlayId).addClass("simplemodal-overlay").css(n.extend(u.o.overlayCss, {
                display: "none",
                opacity: u.o.opacity / 100,
                height: u.o.modal ? t[0] : 0,
                width: u.o.modal ? t[1] : 0,
                position: "fixed",
                left: 0,
                top: 0,
                zIndex: u.o.zIndex + 1
            })).appendTo(u.o.appendTo), u.d.container = n("<div></div>").attr("id", u.o.containerId).addClass("simplemodal-container").css(n.extend(u.o.containerCss, {
                display: "none",
                position: "fixed",
                zIndex: u.o.zIndex + 2
            })).append(u.o.close && u.o.closeHTML ? n(u.o.closeHTML).addClass(u.o.closeClass) : "").appendTo(u.o.appendTo), u.d.wrap = n("<div></div>").attr("tabIndex", -1).addClass("simplemodal-wrap").css({
                height: "100%",
                outline: 0,
                width: "100%",
                overflow: "visible"
            }).appendTo(u.d.container), u.d.data = r.attr("id", r.attr("id") || u.o.dataId).addClass("simplemodal-data").css(n.extend(u.o.dataCss, {
                display: "none"
            })).appendTo("body"), r = null, u.setContainerDimensions(), u.d.data.appendTo(u.d.wrap), i && u.fixIE()
        },
        bindEvents: function() {
            var r = this;
            n("." + r.o.closeClass).bind("click.simplemodal", function(n) {
                n.preventDefault(), r.close()
            }), r.o.modal && r.o.close && r.o.overlayClose && r.d.overlay.bind("click.simplemodal", function(n) {
                n.preventDefault(), r.close()
            }), n(document).bind("keydown.simplemodal", function(n) {
                r.o.modal && r.o.focus && n.keyCode == 9 ? r.watchTab(n) : r.o.close && r.o.escClose && n.keyCode == 27 && (n.preventDefault(), r.close())
            }), n(window).bind("resize.simplemodal", function() {
                t = r.getDimensions(), r.setContainerDimensions(!0), i ? r.fixIE() : r.o.modal && (r.d.iframe && r.d.iframe.css({
                    height: t[0],
                    width: t[1]
                }), r.d.overlay.css({
                    height: t[0],
                    width: t[1]
                }))
            })
        },
        unbindEvents: function() {
            n("." + this.o.closeClass).unbind("click.simplemodal"), n(document).unbind("keydown.simplemodal"), n(window).unbind("resize.simplemodal"), this.d.overlay.unbind("click.simplemodal")
        },
        fixIE: function() {
            var i = this,
                t = i.o.position;
            n.each([i.d.iframe || null, i.o.modal ? i.d.overlay : null, i.d.container], function(n, i) {
                var l, c, o, e;
                if (i) {
                    var s = "document.body.clientHeight",
                        h = "document.body.clientWidth",
                        b = "document.body.scrollHeight",
                        a = "document.body.scrollLeft",
                        v = "document.body.scrollTop",
                        p = "document.body.scrollWidth",
                        y = "document.documentElement.clientHeight",
                        w = "document.documentElement.clientWidth",
                        u = "document.documentElement.scrollLeft",
                        f = "document.documentElement.scrollTop",
                        r = i[0].style;
                    r.position = "absolute", n < 2 ? (r.removeExpression("height"), r.removeExpression("width"), r.setExpression("height", "" + b + " > " + s + " ? " + b + " : " + s + ' + "px"'), r.setExpression("width", "" + p + " > " + h + " ? " + p + " : " + h + ' + "px"')) : (t && t.constructor == Array ? (o = t[0] ? typeof t[0] == "number" ? t[0].toString() : t[0].replace(/px/, "") : i.css("top").replace(/px/, ""), l = o.indexOf("%") == -1 ? o + " + (t = " + f + " ? " + f + " : " + v + ') + "px"' : parseInt(o.replace(/%/, "")) + " * ((" + y + " || " + s + ") / 100) + (t = " + f + " ? " + f + " : " + v + ') + "px"', t[1] && (e = typeof t[1] == "number" ? t[1].toString() : t[1].replace(/px/, ""), c = e.indexOf("%") == -1 ? e + " + (t = " + u + " ? " + u + " : " + a + ') + "px"' : parseInt(e.replace(/%/, "")) + " * ((" + w + " || " + h + ") / 100) + (t = " + u + " ? " + u + " : " + a + ') + "px"')) : (l = "(" + y + " || " + s + ") / 2 - (this.offsetHeight / 2) + (t = " + f + " ? " + f + " : " + v + ') + "px"', c = "(" + w + " || " + h + ") / 2 - (this.offsetWidth / 2) + (t = " + u + " ? " + u + " : " + a + ') + "px"'), r.removeExpression("top"), r.removeExpression("left"), r.setExpression("top", l), r.setExpression("left", c))
                }
            })
        },
        focus: function(t) {
            var r = this,
                u = t || "first",
                i = n(":input:enabled:visible:" + u, r.d.wrap);
            i.length > 0 ? i.focus() : r.d.wrap.focus()
        },
        getDimensions: function() {
            var t = n(window),
                i = n.browser.opera && n.browser.version > "9.5" && n.fn.jquery <= "1.2.6" ? document.documentElement.clientHeight : n.browser.opera && n.browser.version < "9.5" && n.fn.jquery > "1.2.6" ? window.innerHeight : t.height();
            return [i, t.width()]
        },
        getVal: function(n) {
            return n == "auto" ? 0 : n.indexOf("%") > 0 ? n : parseInt(n.replace(/px/, ""))
        },
        setContainerDimensions: function(i) {
            var r = this;
            if (!i || i && r.o.autoResize) {
                var f = n.browser.opera ? r.d.container.height() : r.getVal(r.d.container.css("height")),
                    u = n.browser.opera ? r.d.container.width() : r.getVal(r.d.container.css("width")),
                    s = r.d.data.outerHeight(!0),
                    h = r.d.data.outerWidth(!0),
                    e = r.o.maxHeight && r.o.maxHeight < t[0] ? r.o.maxHeight : t[0],
                    o = r.o.maxWidth && r.o.maxWidth < t[1] ? r.o.maxWidth : t[1];
                f = f ? f > e ? e : f : s ? s > e ? e : s < r.o.minHeight ? r.o.minHeight : s : r.o.minHeight, u = u ? u > o ? o : u : h ? h > o ? o : h < r.o.minWidth ? r.o.minWidth : h : r.o.minWidth, r.d.container.css({
                    height: f,
                    width: u
                })
            }
            r.o.autoPosition && r.setPosition()
        },
        setPosition: function() {
            var n = this,
                r, i, f = t[0] / 2 - n.d.container.outerHeight(!0) / 2,
                u = t[1] / 2 - n.d.container.outerWidth(!0) / 2;
            n.o.position && Object.prototype.toString.call(n.o.position) === "[object Array]" ? (r = n.o.position[0] || f, i = n.o.position[1] || u) : (r = f, i = u), n.d.container.css({
                left: i,
                top: r
            })
        },
        watchTab: function(t) {
            var i = this,
                r;
            n(t.target).parents(".simplemodal-container").length > 0 ? (i.inputs = n(":input:enabled:visible:first, :input:enabled:visible:last", i.d.data[0]), (!t.shiftKey && t.target == i.inputs[i.inputs.length - 1] || t.shiftKey && t.target == i.inputs[0] || i.inputs.length == 0) && (t.preventDefault(), r = t.shiftKey ? "last" : "first", setTimeout(function() {
                i.focus(r)
            }, 10))) : (t.preventDefault(), setTimeout(function() {
                i.focus()
            }, 10))
        },
        open: function() {
            var t = this;
            t.d.iframe && t.d.iframe.show(), n.isFunction(t.o.onOpen) ? t.o.onOpen.apply(t, [t.d]) : (t.d.overlay.show(), t.d.container.show(), t.d.data.show()), t.focus(), t.bindEvents()
        },
        close: function() {
            var t = this,
                i;
            if (!t.d.data) return !1;
            t.unbindEvents(), n.isFunction(t.o.onClose) && !t.occb ? (t.occb = !0, t.o.onClose.apply(t, [t.d])) : (t.d.placeholder ? (i = n("#simplemodal-placeholder"), t.o.persist ? i.replaceWith(t.d.data.removeClass("simplemodal-data").css("display", t.display)) : (t.d.data.hide().remove(), i.replaceWith(t.d.orig))) : t.d.data.hide().remove(), t.d.container.hide().remove(), t.d.overlay.hide().remove(), t.d.iframe && t.d.iframe.hide().remove(), t.d = {})
        }
    }
})(jQuery);

; /// jquery.tipsy.js
(function(n) {
    n.fn.tipsy = function(t) {
        return t = n.extend({}, n.fn.tipsy.defaults, t), this.each(function() {
            var i = n.fn.tipsy.elementOptions(this, t);
            n(this).hover(function() {
                var t, e, r;
                n.data(this, "cancel.tipsy", !0), t = n.data(this, "active.tipsy"), t || (t = n('<div class="tipsy"><div class="tipsy-inner"/></div>'), t.css({
                    position: "absolute",
                    zIndex: 999999
                }), n.data(this, "active.tipsy", t)), (n(this).attr("title") || typeof n(this).attr("original-title") != "string") && n(this).attr("original-title", n(this).attr("title") || "").removeAttr("title"), typeof i.title == "string" ? e = n(this).attr(i.title == "title" ? "original-title" : i.title) : typeof i.title == "function" && (e = i.title.call(this)), t.find(".tipsy-inner")[i.html ? "html" : "text"](e || i.fallback), r = n.extend({}, n(this).offset(), {
                    width: this.offsetWidth,
                    height: this.offsetHeight
                }), t.get(0).className = "tipsy", t.remove().css({
                    top: 0,
                    left: 0,
                    visibility: "hidden",
                    display: "block"
                }).appendTo(document.body);
                var f = t[0].offsetWidth,
                    u = t[0].offsetHeight,
                    o = typeof i.gravity == "function" ? i.gravity.call(this) : i.gravity;
                switch (o.charAt(0)) {
                    case "n":
                        t.css({
                            top: r.top + r.height,
                            left: r.left + r.width / 2 - f / 2
                        }).addClass("tipsy-north");
                        break;
                    case "s":
                        t.css({
                            top: r.top - u,
                            left: r.left + r.width / 2 - f / 2
                        }).addClass("tipsy-south");
                        break;
                    case "e":
                        t.css({
                            top: r.top + r.height / 2 - u / 2,
                            left: r.left - f
                        }).addClass("tipsy-east");
                        break;
                    case "w":
                        t.css({
                            top: r.top + r.height / 2 - u / 2,
                            left: r.left + r.width
                        }).addClass("tipsy-west")
                }
                i.fade ? t.css({
                    opacity: 0,
                    display: "block",
                    visibility: "visible"
                }).animate({
                    opacity: .8
                }) : t.css({
                    visibility: "visible"
                })
            }, function() {
                n.data(this, "cancel.tipsy", !1);
                var t = this;
                setTimeout(function() {
                    if (!n.data(this, "cancel.tipsy")) {
                        var r = n.data(t, "active.tipsy");
                        i.fade ? r.stop().fadeOut(function() {
                            n(this).remove()
                        }) : r.remove()
                    }
                }, 100)
            })
        })
    }, n.fn.tipsy.elementOptions = function(t, i) {
        return n.metadata ? n.extend({}, i, n(t).metadata()) : i
    }, n.fn.tipsy.defaults = {
        fade: !1,
        fallback: "",
        gravity: "n",
        html: !1,
        title: "title"
    }, n.fn.tipsy.autoNS = function() {
        return n(this).offset().top > n(document).scrollTop() + n(window).height() / 2 ? "s" : "n"
    }, n.fn.tipsy.autoWE = function() {
        return n(this).offset().left > n(document).scrollLeft() + n(window).width() / 2 ? "e" : "w"
    }
})(jQuery);

; /// AjaxAvatarThumbnail.js
var RobloxThumbs = function() {
    function n(t, i, r) {
        $.get("/thumbs/rawavatar.ashx", {
            UserID: i,
            ThumbnailFormatID: r
        }, function(u) {
            u == "PENDING" ? window.setTimeout(function() {
                n(t, i, r)
            }, 3e3) : u.substring(5, 0) == "ERROR" || $("#" + t).attr("src", u)
        })
    }
    return {
        GenerateAvatarThumb: function(t, i, r) {
            $("#" + t).attr("src", "/images/spinners/waiting.gif"), n(t, i, r)
        }
    }
}();

; /// extensions/string.js
$.extend(String.prototype, function() {
    function n() {
        return this.replace(/&/g, "&amp;").replace(/</g, "&lt;").replace(/>/g, "&gt;").replace(/"/g, "&quot;").replace(/'/g, "&#39;")
    }
    return {
        escapeHTML: n
    }
}());

; /// StringTruncator.min.js
function InitStringTruncator() {
    isInitialized || (fitStringSpan = document.createElement("span"), fitStringSpan.style.display = "inline", fitStringSpan.style.visibility = "hidden", fitStringSpan.style.padding = "0px", document.body.appendChild(fitStringSpan), isInitialized = !0)
}

function fitStringToWidth(n, t, i) {
    function f(n) {
        return n.replace("<", "&lt;").replace(">", "&gt;")
    }
    if (isInitialized || InitStringTruncator(), i && (fitStringSpan.className = i), i = f(n), fitStringSpan.innerHTML = i, fitStringSpan.offsetWidth > t) {
        for (var i = 0, r, u = n.length; r = u - i >> 1;) r = i + r, fitStringSpan.innerHTML = f(n.substring(0, r)) + "&hellip;", fitStringSpan.offsetWidth > t ? u = r : i = r;
        i = n.substring(0, i) + "&hellip;"
    }
    return i
}

function fitStringToWidthSafe(n, t, i) {
    return n = fitStringToWidth(n, t, i), n.indexOf("&hellip;") != -1 && (t = n.lastIndexOf(" "), t != -1 && t + 10 <= n.length && (n = n.substring(0, t + 2) + "&hellip;")), n
}
var isInitialized = !1,
    fitStringSpan = null;

; /// json2.min.js
var JSON;
JSON || (JSON = {}),
    function() {
        "use strict";

        function i(n) {
            return n < 10 ? "0" + n : n
        }

        function f(n) {
            return o.lastIndex = 0, o.test(n) ? '"' + n.replace(o, function(n) {
                var t = s[n];
                return typeof t == "string" ? t : "\\u" + ("0000" + n.charCodeAt(0).toString(16)).slice(-4)
            }) + '"' : '"' + n + '"'
        }

        function r(i, e) {
            var c, l, h, a, v = n,
                s, o = e[i];
            o && typeof o == "object" && typeof o.toJSON == "function" && (o = o.toJSON(i)), typeof t == "function" && (o = t.call(e, i, o));
            switch (typeof o) {
                case "string":
                    return f(o);
                case "number":
                    return isFinite(o) ? String(o) : "null";
                case "boolean":
                case "null":
                    return String(o);
                case "object":
                    if (!o) return "null";
                    if (n += u, s = [], Object.prototype.toString.apply(o) === "[object Array]") {
                        for (a = o.length, c = 0; c < a; c += 1) s[c] = r(c, o) || "null";
                        return h = s.length === 0 ? "[]" : n ? "[\n" + n + s.join(",\n" + n) + "\n" + v + "]" : "[" + s.join(",") + "]", n = v, h
                    }
                    if (t && typeof t == "object")
                        for (a = t.length, c = 0; c < a; c += 1) l = t[c], typeof l == "string" && (h = r(l, o), h && s.push(f(l) + (n ? ": " : ":") + h));
                    else
                        for (l in o) Object.hasOwnProperty.call(o, l) && (h = r(l, o), h && s.push(f(l) + (n ? ": " : ":") + h));
                    return h = s.length === 0 ? "{}" : n ? "{\n" + n + s.join(",\n" + n) + "\n" + v + "}" : "{" + s.join(",") + "}", n = v, h
            }
        }
        typeof Date.prototype.toJSON != "function" && (Date.prototype.toJSON = function() {
            return isFinite(this.valueOf()) ? this.getUTCFullYear() + "-" + i(this.getUTCMonth() + 1) + "-" + i(this.getUTCDate()) + "T" + i(this.getUTCHours()) + ":" + i(this.getUTCMinutes()) + ":" + i(this.getUTCSeconds()) + "Z" : null
        }, String.prototype.toJSON = Number.prototype.toJSON = Boolean.prototype.toJSON = function() {
            return this.valueOf()
        });
        var e = /[\u0000\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
            o = /[\\\"\x00-\x1f\x7f-\x9f\u00ad\u0600-\u0604\u070f\u17b4\u17b5\u200c-\u200f\u2028-\u202f\u2060-\u206f\ufeff\ufff0-\uffff]/g,
            n, u, s = {
                "\b": "\\b",
                "\t": "\\t",
                "\n": "\\n",
                "\f": "\\f",
                "\r": "\\r",
                '"': '\\"',
                "\\": "\\\\"
            },
            t;
        typeof JSON.stringify != "function" && (JSON.stringify = function(i, f, e) {
            var o;
            if (n = "", u = "", typeof e == "number")
                for (o = 0; o < e; o += 1) u += " ";
            else typeof e == "string" && (u = e);
            if (t = f, f && typeof f != "function" && (typeof f != "object" || typeof f.length != "number")) throw new Error("JSON.stringify");
            return r("", {
                "": i
            })
        }), typeof JSON.parse != "function" && (JSON.parse = function(n, t) {
            function r(n, i) {
                var f, e, u = n[i];
                if (u && typeof u == "object")
                    for (f in u) Object.hasOwnProperty.call(u, f) && (e = r(u, f), e !== undefined ? u[f] = e : delete u[f]);
                return t.call(n, i, u)
            }
            var i;
            if (n = String(n), e.lastIndex = 0, e.test(n) && (n = n.replace(e, function(n) {
                    return "\\u" + ("0000" + n.charCodeAt(0).toString(16)).slice(-4)
                })), /^[\],:{}\s]*$/.test(n.replace(/\\(?:["\\\/bfnrt]|u[0-9a-fA-F]{4})/g, "@").replace(/"[^"\\\n\r]*"|true|false|null|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?/g, "]").replace(/(?:^|:|,)(?:\s*\[)+/g, ""))) return i = eval("(" + n + ")"), typeof t == "function" ? r({
                "": i
            }, "") : i;
            throw new SyntaxError("JSON.parse");
        })
    }();

; /// webkit.js
typeof Sys.Browser.WebKit == "undefined" && (Sys.Browser.WebKit = {}), navigator.userAgent.indexOf("WebKit/") > -1 && (Sys.Browser.agent = Sys.Browser.WebKit, Sys.Browser.version = parseFloat(navigator.userAgent.match(/WebKit\/(\d+(\.\d+)?)/)[1]), Sys.Browser.name = "WebKit");

; /// GoogleAnalytics/GoogleAnalyticsEvents.js
var GoogleAnalyticsEvents = new function() {
    this.FireEvent = function(n) {
        if (typeof _gaq != typeof undefined) {
            var i = ["_trackEvent"],
                t = ["b._trackEvent"];
            _gaq.push(i.concat(n)), _gaq.push(t.concat(n))
        }
    }
};

; /// MasterPageUI.js
$(function() {
    $(".tooltip").tipsy(), $(".tooltip-top").tipsy({
        gravity: "s"
    }), $(".tooltip-right").tipsy({
        gravity: "w"
    }), $(".tooltip-left").tipsy({
        gravity: "e"
    }), $(".tooltip-bottom").tipsy({
        gravity: "n"
    })
}), typeof Roblox == "undefined" && (Roblox = {}), Roblox.FixedUI = function() {
    function s() {
        if (typeof pageYOffset != "undefined") return pageYOffset;
        var t = document.body,
            n = document.documentElement;
        return n = n.clientHeight ? n : t, n.scrollTop
    }

    function e() {
        var n = s();
        t || (t = $("iframe.IframeAdHide")), t.each(function() {
            var t = $(this).offset().top - 73;
            !r.gutterAdsEnabled && n >= t ? $(this).css("visibility", "hidden") : $(this).css("visibility", "visible")
        })
    }

    function i() {
        $("#Nav").css("cssText", "position: static !important;width:970px !important"), $("#SmallHeaderContainer").css("cssText", "position: relative !important;height: 36px !important;width:970px !important"), $(".forceSpace").css("cssText", "width: 970px !important; height:9px !important;padding-top: 0px !important;background:white"), $("#Container").css("cssText", "width: 970px !important"), $(".mySubmenuFixed").css("cssText", "position: relative; top: 0px;"), $("#MasterContainer").css("cssText", "width: 970px !important"), $(".mySubmenuFixed").length == 1 && ($(".forceSpaceUnderSubmenu").hide(), $(".forceSpace").css("cssText", "width: 910px !important; height:7px !important;padding-top: 0px !important;")), $(window).unbind("scroll")
    }

    function h() {
        $("#Nav").css("cssText", "position: fixed !important;width:100% !important"), $("#SmallHeaderContainer").css("cssText", "position: fixed !important;height: 40px !important;width:100% !important"), $(".forceSpace").css("cssText", "width: 100% !important; height:15px !important;padding-top: 62px !important;"), $("#Container").css("cssText", "width: 100% !important"), $(".mySubmenuFixed").css("cssText", "position: fixed; top: 68px;"), $("#MasterContainer").css("cssText", "width: 100%"), $(".mySubmenuFixed").length == 1 && $(".forceSpaceUnderSubmenu").show(), $(window).scroll(e)
    }

    function o() {
        var n = 1024;
        return document.body && document.body.offsetWidth && (n = document.body.offsetWidth), window.innerWidth && window.innerHeight && (n = window.innerWidth), n
    }

    function u() {
        o() < 978 ? i() : h()
    }
    var n = navigator.userAgent.toLowerCase(),
        f = /mobile/i.test(n) || /ipad/i.test(n) || /iphone/i.test(n) || /android/i.test(n) || /playbook/i.test(n) || /blackberry/i.test(n),
        t, r;
    return $(function() {
        f ? i() : $(window).load(u).resize(u)
    }), t = null, r = {
        isMobile: f,
        gutterAdsEnabled: !1,
        unfixHeader: i
    }
}();

; /// jquery.cookie.js
jQuery.cookie = function(n, t, i) {
    var o, r, f, e, u, s;
    if (typeof t != "undefined") {
        i = i || {}, t === null && (t = "", i.expires = -1), o = "", i.expires && (typeof i.expires == "number" || i.expires.toUTCString) && (typeof i.expires == "number" ? (r = new Date, r.setTime(r.getTime() + i.expires * 864e5)) : r = i.expires, o = "; expires=" + r.toUTCString());
        var h = i.path ? "; path=" + i.path : "",
            c = i.domain ? "; domain=" + i.domain : "",
            l = i.secure ? "; secure" : "";
        document.cookie = [n, "=", encodeURIComponent(t), o, h, c, l].join("")
    } else {
        if (f = null, document.cookie && document.cookie != "")
            for (e = document.cookie.split(";"), u = 0; u < e.length; u++)
                if (s = jQuery.trim(e[u]), s.substring(0, n.length + 1) == n + "=") {
                    f = decodeURIComponent(s.substring(n.length + 1));
                    break
                } return f
    }
};

; /// jquery.jsoncookie.js
function RobloxJSONCookie(n) {
    this._cookiename = n
}(function(n) {
    var t = function(n) {
        return typeof n == "object" && !(n instanceof Array) && n !== null
    };
    n.extend({
        getJSONCookie: function(t, i) {
            var r = n.cookie(t);
            return i ? r : r ? JSON.parse(r) : {}
        },
        setJSONCookie: function(i, r, u) {
            var f = "";
            return u = n.extend({
                expires: 90,
                path: "/"
            }, u), f = t(r) ? JSON.stringify(r) : r, n.cookie(i, f, u)
        },
        removeJSONCookie: function(t) {
            return n.cookie(t, null)
        },
        JSONCookie: function(t, i, r) {
            return i && n.setJSONCookie(t, i, r), n.getJSONCookie(t)
        }
    })
})(jQuery), RobloxJSONCookie.prototype = {
    Delete: function() {
        return $.removeJSONCookie(this._cookiename)
    },
    SetObj: function(n, t) {
        return t || (t = {
            path: "/"
        }), $.JSONCookie(this._cookiename, n, t)
    },
    SetJSON: function(n, t) {
        return t || (t = {
            path: "/"
        }), $.JSONCookie(this._cookiename, n, t)
    },
    GetObj: function() {
        var n = $.getJSONCookie(this._cookiename, !1);
        return n == null ? {} : n
    },
    GetJSON: function() {
        return $.getJSONCookie(this._cookiename, !0)
    }
};

; /// XsrfToken.js
typeof Roblox == "undefined" && (Roblox = {}), Roblox.XsrfToken = function() {
    function f(n) {
        var u, t;
        if (i.allUrlsEnabled) return !0;
        for (u = n.split("?")[0].toLowerCase(), t = 0; t < r.length; t++)
            if (r[t] === u) return !0;
        return !1
    }

    function e(n) {
        r.push(n.toLowerCase())
    }

    function o(t) {
        n = t
    }

    function u() {
        return n
    }
    var n = "",
        t = /(^|\?|&)token=[^&]*/,
        r = ["/chat/friendhandler.ashx", "/chat/party.ashx", "/chat/send.ashx", "/chat/utility.ashx", "/groups/rolesetupdater.ashx", "groups.aspx/exileuseranddeleteposts", "messageshandler.ashx", "emailupgrademe.ashx", "/services/usercheck.asmx/updatepersonalinfo", "/thumbs/assetmedia/placemediaitemsorthandler.ashx"],
        i;
    return $.ajaxPrefilter(function(i) {
        var o, e;
        i.dataType != "jsonp" && i.dataType != "script" && n != "" && f(i.url) && (o = $.param({
            token: n
        }), t.test(i.url) || typeof i.data != "undefined" && t.test(i.data) || (i.url += /\?/.test(i.url) ? "&token=" + encodeURIComponent(n) : "?token=" + encodeURIComponent(n)), e = i.error, i.error = function(r, u, f) {
            if (r.status == 420) {
                var o = r.getResponseHeader("Token");
                if (o == null) {
                    typeof e == "function" && e(r, u, f);
                    throw new Error("Null token returned by Xsrf enabled handler");
                }
                t.test(i.url) ? i.url = i.url.replace(t, "$1token=" + encodeURIComponent(o)) : i.data = i.data.replace(t, "$1token=" + encodeURIComponent(o)), $.ajax(i), n = o
            } else typeof e == "function" && e(r, u, f)
        })
    }), i = {
        setToken: o,
        getToken: u,
        allUrlsEnabled: !1,
        addEnabledUrl: e
    }
}();

; /// RobloxEventManager.js
function RBXBaseEventListener() {
    if (!(this instanceof RBXBaseEventListener)) return new RBXBaseEventListener;
    this.init = function() {
        for (eventKey in this.events) $(document).bind(this.events[eventKey], $.proxy(this.localCopy, this))
    }, this.events = [], this.localCopy = function(n, t) {
        var r = $.extend(!0, {}, n),
            i = $.extend(!0, {}, t);
        this.handleEvent(r, i)
    }, this.distillData = function() {
        return console.log("RBXEventListener distillData - Please implement me"), !1
    }, this.handleEvent = function() {
        return console.log("EventListener handleEvent - Please implement me"), !1
    }, this.fireEvent = function() {
        return console.log("EventListener fireEvent - Please implement me"), !1
    }
}
RobloxEventManager = new function() {
    function u(n) {
        var i = new RegExp(n + "=([^;]*)"),
            t = i.exec(document.cookie);
        return t ? t[1] : null
    }

    function t(n) {
        for (var u = {}, r = n.split("&"), i, t = 0; t < r.length; t++) i = r[t].split("="), u[i[0]] = i[1];
        return u
    }

    function i(n) {
        var i = u(n);
        return i ? t(i) : null
    }
    var n = [],
        r = {};
    this.enabled = !1, this.initialized = !1, this.eventQueue = [], this.initialize = function(n) {
        for (this.initialized = !0, this.enabled = n; this.eventQueue.length > 0;) {
            var t = this.eventQueue.pop();
            this.triggerEvent(t.eventName, t.args)
        }
    }, this.getMarketingGuid = function() {
        var n = i("RBXEventTracker");
        return n != null ? n.browserid : -1
    }, this.triggerEvent = function(n, t) {
        this.initialized ? this.enabled && (typeof t == "undefined" && (t = {}), t.guid = this.getMarketingGuid(), t.guid != -1 && $(document).trigger(n, [t])) : this.eventQueue.push({
            eventName: n,
            args: t
        })
    }, this.registerCookieStoreEvent = function(t) {
        n.push(t)
    }, this.insertDataStoreKeyValuePair = function(n, t) {
        r[n] = t
    }, this.monitorCookieStore = function() {
        var i, u, f, t, r;
        try {
            if (typeof Roblox == "undefined" || typeof Roblox.Client == "undefined" || window.location.protocol == "https:") return;
            if (i = Roblox.Client.CreateLauncher(!1), i == null) return;
            for (u = 0; u < n.length; u++) try {
                f = n[u], t = i.GetKeyValue(f), t != "" && t != "-1" && t != "RBX_NOT_VALID" && (r = eval("(" + t + ")"), r.userType = r.userId > 0 ? "user" : "guest", RobloxEventManager.triggerEvent(f, r), i.SetKeyValue(f, "RBX_NOT_VALID"))
            } catch (e) {}
            Roblox.Client.ReleaseLauncher(i, !1, !1)
        } catch (e) {}
    }
};

; /// RobloxEventListener.js
RobloxListener = new RBXBaseEventListener, RobloxListener.handleEvent = function(n, t) {
    var r, u, i;
    switch (n.type) {
        case "rbx_evt_install_begin":
            i = {
                guid: "guid",
                userId: "userid"
            }, r = n.type;
            break;
        case "rbx_evt_initial_install_start":
            i = {
                guid: "guid",
                userId: "userid"
            }, r = n.type;
            break;
        case "rbx_evt_ftp":
            i = {
                guid: "guid",
                userId: "userid"
            }, r = n.type;
            break;
        case "rbx_evt_initial_install_success":
            i = {
                guid: "guid",
                userId: "userid"
            }, r = n.type;
            break;
        case "rbx_evt_fmp":
            i = {
                guid: "guid",
                userId: "userid"
            }, r = n.type;
            break;
        default:
            return console.log("RobloxEventListener - Event registered without handling instructions: " + n.type), !1
    }
    return u = this.distillData(t, i), this.fireEvent(this.eventToString(r, u)), !0
}, RobloxListener.distillData = function(n, t) {
    var i = {};
    for (dataKey in t) typeof n[dataKey] != typeof undefined && (i[t[dataKey]] = encodeURIComponent(n[dataKey]));
    return i
}, RobloxListener.eventToString = function(n, t) {
    var i = RobloxListener.restUrl;
    if (i += "?event=" + n + "&", t != null)
        for (arg in t) typeof arg != typeof undefined && t.hasOwnProperty(arg) && (i += arg + "=" + t[arg] + "&");
    return i = i.slice(0, i.length - 1)
}, RobloxListener.fireEvent = function(n) {
    var t = $('<img width="1" height="1" src="' + n + '"/>')
}, RobloxListener.events = ["rbx_evt_install_begin", "rbx_evt_initial_install_start", "rbx_evt_ftp", "rbx_evt_initial_install_success", "rbx_evt_fmp"];

; /// KontagentEventListener.js
KontagentListener = new RBXBaseEventListener, KontagentListener.restUrl = "", KontagentListener.APIKey = "", KontagentListener.StagingAPIKey = "", KontagentListener.StagingEvents = [], KontagentListener.handleEvent = function(n, t) {
    function f(n) {
        return n = n.toLowerCase(), n == "win32" ? n = "Windows" : n == "osx" && (n = "Mac"), n
    }
    var r, u, i, o, e;
    r = "evt";
    switch (n.type) {
        case "rbx_evt_pageview":
            i = {
                guid: "s",
                path: "u",
                ts: "ts",
                user_ip: "ip"
            }, r = "pgr";
            break;
        case "rbx_evt_userinfo":
            i = {
                guid: "s",
                age: "b",
                gender: "g"
            }, r = "cpu";
            break;
        case "rbx_evt_ecomm_item":
            t.total = Math.round(t.total * 100), t.productName = t.productName.replace(/\s/g, "").replace("Outrageous", "O").replace("Turbo", "T").replace("Builders", "B").replace("Club", "C"), i = {
                guid: "s",
                total: "v",
                provider: "st1",
                category: "st2",
                productName: "st3",
                type: "tu"
            }, r = "mtu";
            break;
        case "rbx_evt_ftp":
            t.tracking = "", t.shorttracking = "", i = {
                guid: "s",
                trackingtag: "u",
                shorttracking: "su"
            }, u = this.distillData(t, i), r = "apa", this.fireEvent(this.eventToString(n.type, r, u)), t.eventName = "Install Success Funnel", t.eventType = "Install Success Funnel", t.os = f(t.os), i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                eventName: "n"
            }, u = this.distillData(t, i), r = "evt", this.fireEvent(this.eventToString(n.type, r, u)), t.eventType = "Install Success Place", i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                placeId: "n"
            };
            break;
        case "rbx_evt_initial_install_success":
            t.tracking = "", t.shorttracking = "", i = {
                guid: "s",
                trackingtag: "u",
                shorttracking: "su"
            }, u = this.distillData(t, i), r = "apa", this.fireEvent(this.eventToString(n.type, r, u)), t.eventName = "Bootstrapper Install Success Funnel", t.eventType = "Bootstrapper Install Success Funnel", t.os = f(t.os), i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                eventName: "n"
            }, u = this.distillData(t, i), r = "evt", this.fireEvent(this.eventToString(n.type, r, u)), t.eventType = "Bootstrapper Install Success Place", i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                placeId: "n"
            };
            break;
        case "rbx_evt_install_begin":
            t.eventName = "Install Begin", t.eventType = "Install Begin", i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                eventName: "n"
            };
            break;
        case "rbx_evt_initial_install_start":
            t.eventName = "Bootstrapper Install Begin", t.eventType = "Bootstrapper Install Begin", i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                eventName: "n"
            };
            break;
        case "rbx_evt_fmp":
            t.eventName = "Five Minute Play Funnel", t.eventType = "Five Minute Play Funnel", t.os = f(t.os), i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                eventName: "n"
            }, u = this.distillData(t, i), this.fireEvent(this.eventToString(n.type, r, u)), t.eventType = "Five Minute Play Place", i = {
                guid: "s",
                eventType: "st1",
                os: "st2",
                userType: "st3",
                placeId: "n"
            };
            break;
        case "rbx_evt_play_user":
            t.eventName = "Play User", t.eventType = "Play User", t.gender = t.gender, i = {
                guid: "s",
                eventType: "st1",
                gender: "st2",
                age: "st3",
                placeId: "l",
                eventName: "n"
            };
            break;
        case "rbx_evt_play_guest":
            t.eventName = "Play Guest", t.eventType = "Play Guest", t.gender = t.gender, i = {
                guid: "s",
                eventType: "st1",
                gender: "st2",
                placeId: "l",
                eventName: "n"
            };
            break;
        case "rbx_evt_signup":
            t.eventName = "Sign Up Funnel", t.eventType = "Sign Up Funnel", i = {
                guid: "s",
                eventType: "st1",
                eventName: "n"
            }, u = this.distillData(t, i), r = "evt", this.fireEvent(this.eventToString(n.type, r, u)), t.eventName = "Sign Up", t.eventType = "Sign Up", t.gender = t.gender, i = {
                guid: "s",
                eventType: "st1",
                gender: "st2",
                age: "st3",
                eventName: "n"
            };
            break;
        case "rbx_evt_ecomm_custom":
            t.eventType = "Purchase", t.productName = t.productName.replace(/\s/g, "").replace("Outrageous", "O").replace("Turbo", "T").replace("Builders", "B").replace("Club", "C"), i = {
                guid: "s",
                eventType: "st1",
                provider: "st2",
                category: "st3",
                productName: "n"
            };
            break;
        case "rbx_evt_abtest":
            i = {
                guid: "s",
                experiment: "st1",
                variation: "n"
            };
            break;
        case "rbx_evt_pageview_custom":
            t.eventName = t.page, i = typeof t.userType == "undefined" ? {
                guid: "s",
                page: "st1",
                eventName: "n"
            } : {
                guid: "s",
                page: "st1",
                userType: "st2",
                eventName: "n"
            };
            break;
        case "rbx_evt_generic":
            t.eventName = t.type, i = {
                guid: "s",
                type: "st1",
                eventName: "n"
            }, typeof t.opt1 != "undefined" && (i.opt1 = "st2"), typeof t.opt2 != "undefined" && typeof t.opt1 != "undefined" && (i.opt2 = "st3");
            break;
        case "rbx_evt_source_tracking":
            t.installed = 0, t.sourceType = "ad", i = {
                guid: "s",
                sourceType: "tu",
                installed: "i",
                source: "st1",
                campaign: "st2",
                medium: "st3"
            }, r = "ucc";
            break;
        case "rbx_evt_card_redemption":
            t.eventType = "CardRedemption", t.eventName = "CardRedemption", i = {
                guid: "s",
                eventType: "st1",
                merchant: "st2",
                cardValue: "st3",
                eventName: "n"
            };
            break;
        case "rbx_evt_popup_action":
            t.eventType = "GuestPlayPopupAction", t.eventName = "GuestPlayPopupAction", i = {
                guid: "s",
                eventType: "st1",
                action: "st2",
                eventName: "n"
            };
            break;
        default:
            return console.log("KontagentListener - Event registered without handling instructions: " + n.type), !1
    }
    return u = this.distillData(t, i), this.fireEvent(this.eventToString(n.type, r, u)), !0
}, KontagentListener.distillData = function(n, t) {
    var i = {};
    for (dataKey in t) typeof n[dataKey] != typeof undefined && (i[t[dataKey]] = encodeURIComponent(n[dataKey]));
    return i
}, KontagentListener.eventToString = function(n, t, i) {
    var r = KontagentListener.restUrl,
        u = this.isStagingEvent(n, i) ? KontagentListener.StagingAPIKey : KontagentListener.APIKey;
    if (r += u + "/" + t + "/?", i != null)
        for (arg in i) typeof arg != typeof undefined && i.hasOwnProperty(arg) && (r += arg + "=" + i[arg] + "&");
    return r = r.slice(0, r.length - 1)
}, KontagentListener.isStagingEvent = function(n, t) {
    var r, i;
    staging = !1;
    try {
        for (r in this.StagingEvents)
            if (i = this.StagingEvents[r], typeof i == "string") {
                if (n == i) {
                    staging = !0;
                    break
                }
            } else if (typeof i == "object" && typeof i[n] != "undefined" && i[n] == t.st1) {
            staging = !0;
            break
        }
    } catch (u) {}
    return staging
}, KontagentListener.fireEvent = function(n) {
    var t = $('<img width="1" height="1" src="' + n + '"/>')
}, KontagentListener.events = ["rbx_evt_pageview", "rbx_evt_install_begin", "rbx_evt_initial_install_start", "rbx_evt_ftp", "rbx_evt_initial_install_success", "rbx_evt_fmp", "rbx_evt_play_user", "rbx_evt_play_guest", "rbx_evt_signup", "rbx_evt_ecomm_item", "rbx_evt_ecomm_custom", "rbx_evt_userinfo", "rbx_evt_abtest", "rbx_evt_pageview_custom", "rbx_evt_generic", "rbx_evt_source_tracking", "rbx_evt_card_redemption", "rbx_evt_popup_action"];

; /// GoogleEventListener.js
GoogleListener = new RBXBaseEventListener, GoogleListener.handleEvent = function(n, t) {
    function r(n) {
        return n = n.toLowerCase(), n == "win32" ? n = "Windows" : n == "osx" && (n = "Mac"), n
    }
    var f, u, i;
    switch (n.type) {
        case "rbx_evt_initial_install_begin":
            t.os = r(t.os), t.category = "Bootstrapper Install Begin", i = {
                os: "action"
            };
            break;
        case "rbx_evt_ftp":
            t.os = r(t.os), t.category = "Install Success", i = {
                os: "action"
            };
            break;
        case "rbx_evt_initial_install_success":
            t.os = r(t.os), t.category = "Bootstrapper Install Success", i = {
                os: "action"
            };
            break;
        case "rbx_evt_fmp":
            t.os = r(t.os), t.category = "Five Minute Play", i = {
                os: "action"
            };
            break;
        case "rbx_evt_abtest":
            i = {
                experiment: "category",
                variation: "action",
                version: "opt_label"
            };
            break;
        case "rbx_evt_card_redemption":
            t.category = "CardRedemption", i = {
                merchant: "action",
                cardValue: "opt_label"
            };
            break;
        default:
            return console.log("GoogleListener - Event registered without handling instructions: " + n.type), !1
    }
    return i.category = "category", u = this.distillData(t, i), this.fireEvent(u), !0
}, GoogleListener.distillData = function(n, t) {
    var i = {},
        r;
    for (dataKey in t) typeof n[dataKey] != typeof undefined && (i[t[dataKey]] = n[dataKey]);
    return r = [i.category, i.action], i.opt_label != null && (r = r.concat(i.opt_label)), i.opt_value != null && (r = r.concat(i.opt_value)), r
}, GoogleListener.fireEvent = function(n) {
    if (typeof _gaq != typeof undefined) {
        var i = ["_trackEvent"],
            t = ["b._trackEvent"];
        _gaq.push(i.concat(n)), _gaq.push(t.concat(n))
    }
}, GoogleListener.events = ["rbx_evt_initial_install_begin", "rbx_evt_ftp", "rbx_evt_initial_install_success", "rbx_evt_fmp", "rbx_evt_abtest", "rbx_evt_card_redemption"];

; /// MongoEventListener.js
MongoListener = new RBXBaseEventListener, MongoListener.handleEvent = function(n, t) {
    var i;
    return i = typeof t.shard == "undefined" ? this.defaultShard : t.shard, typeof t.eventName == "undefined" && (t.eventName = n.type), t.eventName === "JavascriptExceptionLoggingEvent" ? dataMap = {
        category: "category",
        url: "url",
        msg: "msg",
        line: "line",
        ua: "UA"
    } : (typeof t.category == "undefined" && (t.category = MongoListener.getCategoryFromEventName(t.eventName)), t.userId = MongoListener.userId, t.ip = MongoListener.clientIpAddress, dataMap = {
        guid: "guid",
        category: "category",
        userId: "userid",
        ip: "ip"
    }), this.fireEvent(i, this.distillData(t, dataMap)), !0
}, MongoListener.getCategoryFromEventName = function(n) {
    switch (n) {
        case "rbx_evt_sitetouch":
            return "SiteTouch";
        case "rbx_evt_fmp":
            return "FiveMinutePlay";
        case "rbx_evt_play_user":
        case "rbx_evt_play_guest":
            return "Play";
        default:
            return n
    }
}, MongoListener.distillData = function(n, t) {
    var i = {};
    for (dataKey in t) typeof n[dataKey] != typeof undefined && (i[t[dataKey]] = encodeURIComponent(n[dataKey]));
    return i
}, MongoListener.fireEvent = function(n, t) {
    $.ajax({
        url: MongoListener.loggingURI + n,
        dataType: "jsonp",
        jsonpCallback: "MongoListener.callback",
        data: t
    })
}, MongoListener.callback = function() {}, MongoListener.events = ["JavascriptExceptionLoggingEvent"];

; /// SearchVisionListener.js
SearchVisionListener = new RBXBaseEventListener, SearchVisionListener.handleEvent = function(n, t) {
    var i = null;
    switch (n.type) {
        case "rbx_evt_fmp":
            i = {
                esvtk_v: "1",
                esvtk_esvid: "A40125",
                event: "five_minute_play"
            };
            break;
        case "rbx_evt_ftp":
            i = {
                esvtk_v: "1",
                esvtk_esvid: "A40125",
                event: "first_play"
            };
            break;
        case "rbx_evt_install_begin":
            i = {
                esvtk_v: "1",
                esvtk_esvid: "A40125",
                event: "download"
            };
            break;
        case "rbx_evt_signup":
            i = {
                esvtk_v: "1",
                esvtk_esvid: "A40125",
                event: "esv_signup"
            };
            break;
        case "rbx_evt_generic":
            t.type === "OneDayReturn" && (i = {
                esvtk_v: "1",
                esvtk_esvid: "A40125",
                event: "return"
            })
    }
    return i !== null && (i.orderid = t.guid, this.fireEvent(i)), !0
}, SearchVisionListener.fireEvent = function(n) {
    typeof esvtk_track != "undefined" ? esvtk_track(n) : setTimeout(function() {
        SearchVisionListener.fireEvent(n)
    }, 500)
}, SearchVisionListener.events = ["rbx_evt_fmp", "rbx_evt_ftp", "rbx_evt_install_begin", "rbx_evt_signup", "rbx_evt_generic"];

; /// SiteTouchEvent.js
typeof Roblox == "undefined" && (Roblox = {}), Roblox.SiteTouchEvent = function() {
    function r() {
        var t, i;
        return typeof localStorage != "undefined" && (t = localStorage.getItem(n)), (typeof t == "undefined" || t === null) && (t = $.cookie(n)), i = Date.parse(t), t && !isNaN(i) ? new Date(i) : new Date(0)
    }

    function i(i) {
        typeof i == "undefined" && (i = new Date), typeof localStorage != "undefined" && (t.useLocalStorage ? $.cookie(n, null) : localStorage.removeItem(n)), t.useLocalStorage && typeof localStorage != "undefined" ? localStorage.setItem(n, i) : $.cookie(n, i, {
            expires: 100
        })
    }

    function u() {
        var n = r();
        Math.floor((new Date - n) / 36e5) >= t.dateDiffThresholdInHours && RobloxEventManager.triggerEvent("rbx_evt_sitetouch"), i()
    }
    var n = "LastActivity",
        t = {
            updateLastActivityAndFireEvent: u,
            getLastActivity: r,
            setLastActivity: i,
            dateDiffThresholdInHours: 3,
            useLocalStorage: !1
        };
    return t
}();

; /// JSErrorTracker.js
typeof Roblox == "undefined" && (Roblox = {}), Roblox.JSErrorTracker = {
    showAlert: !1,
    defaultPixel: "GA",
    internalEventListenerPixelEnabled: !1,
    javascriptStackTraceEnabled: !1,
    data: {
        category: "Javascript Errors"
    },
    initialize: function(n) {
        typeof n != "undefined" && (typeof n.showAlert != "undefined" && (this.showAlert = n.showAlert), typeof n.internalEventListenerPixelEnabled != "undefined" && (this.internalEventListenerPixelEnabled = n.internalEventListenerPixelEnabled)), this.addOnErrorEventHandler(this.errorHandler)
    },
    errorHandler: function(n, t, i) {
        try {
            Roblox.JSErrorTracker.data.msg = n, Roblox.JSErrorTracker.data.url = t, Roblox.JSErrorTracker.data.line = i, Roblox.JSErrorTracker.data.ua = window.navigator.userAgent, Roblox.JSErrorTracker.logException(Roblox.JSErrorTracker.data)
        } catch (r) {}
        return !0
    },
    addOnErrorEventHandler: function(n) {
        var t = window.onerror;
        window.onerror = typeof window.onerror == "function" ? function(i, r, u) {
            t(i, r, u), n(i, r, u)
        } : n
    },
    processException: function(n, t) {
        if (typeof n != "undefined") {
            typeof n.category == "undefined" && (n.category = Roblox.JSErrorTracker.data.category);
            switch (t) {
                case "GA":
                    var i = {
                        category: "category",
                        url: "action",
                        msg: "opt_label",
                        line: "opt_value"
                    };
                    Roblox.JSErrorTracker.fireGAPixel(Roblox.JSErrorTracker.distillGAData(n, i));
                    break;
                case "Diag":
                    Roblox.JSErrorTracker.internalEventListenerPixelEnabled && (n.category = "JavascriptExceptions", n.shard = "WebMetrics", n.eventName = "JavascriptExceptionLoggingEvent", RobloxEventManager.triggerEvent("JavascriptExceptionLoggingEvent", n));
                    break;
                default:
                    console.log("Roblox JSErrorTracker received an unknown pixel to fire")
            }
            return !0
        }
    },
    logException: function(n) {
        Roblox.JSErrorTracker.processException(n, Roblox.JSErrorTracker.defaultPixel), Roblox.JSErrorTracker.internalEventListenerPixelEnabled && Roblox.JSErrorTracker.processException(n, "Diag"), Roblox.JSErrorTracker.showErrorMessage(n.msg)
    },
    distillData: function(n, t) {
        var r = {},
            i;
        for (i in t) typeof n[i] != "undefined" && (r[t[i]] = encodeURIComponent(n[i]));
        return r
    },
    distillGAData: function(n, t) {
        var r = Roblox.JSErrorTracker.distillData(n, t),
            i = [decodeURIComponent([r.category])];
        return typeof r.action != typeof undefined ? (i = i.concat(decodeURIComponent(r.action)), typeof r.opt_label != typeof undefined && (i = i.concat(decodeURIComponent(r.opt_label)), typeof r.opt_value != typeof undefined && (i = i.concat(parseInt(decodeURIComponent(r.opt_value)))))) : Roblox.JSErrorTracker.showAlert && alert("Missing a required parameter for GA"), i
    },
    createURL: function(n, t, i) {
        var r = n,
            f = Roblox.JSErrorTracker.distillData(t, i),
            u;
        if (r += "?", f != null)
            for (u in f) typeof u != typeof undefined && t.hasOwnProperty(u) && (r += u + "=" + f[u] + "&");
        return r = r.slice(0, r.length - 1)
    },
    fireGAPixel: function(n) {
        typeof _gaq != "undefined" && _gaq.push(["c._trackEvent"].concat(n))
    },
    showErrorMessage: function(n) {
        Roblox.JSErrorTracker.showAlert && (n !== null ? alert(n) : alert("An error occured"))
    }
};

; /// Studio2Alert.js
var studio2AlertModal = {
    showPrompt: !1,
    userId: 0,
    updateStudioAlertUserPreference: function() {
        $.ajax({
            type: "GET",
            url: "/WebHandlers/Studio2Alert.ashx?uId=" + studio2AlertModal.userId
        })
    },
    close: function() {
        studio2AlertModal.updateStudioAlertUserPreference(), $.modal.close("#Studio2AlertModal")
    },
    init: function() {
        studio2AlertModal.showPrompt = $("#Studio2AlertModal").data("showprompt"), studio2AlertModal.userId = $("#Studio2AlertModal").data("userid");
        var n = {
            escClose: !0,
            opacity: 80,
            overlayCss: {
                backgroundColor: "#000"
            }
        };
        studio2AlertModal.showPrompt && Roblox.Client.isIDE() && (studio2AlertModal.updateStudioAlertUserPreference(), $("#Studio2AlertModal").modal(n))
    }
};
$("#closeStudio2Alert").click(function() {
    studio2AlertModal.close()
}), $(function() {
    studio2AlertModal.init()
});

; /// ClientInstaller.js
function tryToDownload() {
    oIFrm = document.getElementById("downloadInstallerIFrame"), oIFrm.src = "/install/setup.ashx"
}

function logStatistics(n) {
    $.get("/install/VisitButtonHandler.ashx?reqtype=" + n, function() {})
}
Type.registerNamespace("Roblox.Client"), Roblox.Client._installHost = null, Roblox.Client._installSuccess = null, Roblox.Client._CLSID = null, Roblox.Client._continuation = null, Roblox.Client._skip = null, Roblox.Client._isIDE = null, Roblox.Client._isRobloxBrowser = null, Roblox.Client._isPlaceLaunch = !1, Roblox.Client._silentModeEnabled = !1, Roblox.Client._bringAppToFrontEnabled = !1, Roblox.Client._numLocks = 0, Roblox.Client._logTiming = !1, Roblox.Client._logStartTime = null, Roblox.Client._logEndTime = null, Roblox.Client._hiddenModeEnabled = !1, Roblox.Client._runInstallABTest = function() {}, Roblox.Client.ReleaseLauncher = function(n, t, i) {
    if (t && Roblox.Client._numLocks--, (i || Roblox.Client._numLocks <= 0) && (n != null && (document.getElementById("pluginObjDiv").innerHTML = "", n = null), Roblox.Client._numLocks = 0), Roblox.Client._logTiming) {
        Roblox.Client._logEndTime = new Date;
        var r = Roblox.Client._logEndTime.getTime() - Roblox.Client._logStartTime.getTime();
        console && console.log && console.log("Roblox.Client: " + r + "ms from Create to Release.")
    }
}, Roblox.Client.GetInstallHost = function(n) {
    if (window.ActiveXObject) return n.InstallHost;
    var t = n.Get_InstallHost();
    return t.match(/roblox.com$/) ? t : t.substring(0, t.length - 1)
}, Roblox.Client.CreateLauncher = function(n) {
    var i, u, t, r;
    Roblox.Client._logTiming && (Roblox.Client._logStartTime = new Date), n && Roblox.Client._numLocks++, (Roblox.Client._installHost == null || Roblox.Client._CLSID == null) && typeof initClientProps == "function" && initClientProps(), i = document.getElementById("robloxpluginobj"), u = $("#pluginObjDiv"), i || (Roblox.Client._hiddenModeEnabled = !1, window.ActiveXObject ? (t = '<object classid="clsid:' + Roblox.Client._CLSID + '"', t += ' id="robloxpluginobj" type="application/x-vnd-roblox-launcher"', t += ' codebase="' + Roblox.Client._installHost + '">Failed to INIT Plugin</object>', $(u).append(t)) : (t = '<object id="robloxpluginobj" type="application/x-vnd-roblox-launcher">', t += "<p>You need Our Plugin for this.  Get the latest version from", t += '<a href="' + Roblox.Client._installHost + '">here</a>.</p></object>', $(u).append(t)), i = document.getElementById("robloxpluginobj"));
    try {
        if (i || (typeof console.log == "undefined" ? alert("Plugin installation failed!") : console.log("Plugin installation failed!")), i.Hello(), r = Roblox.Client.GetInstallHost(i), !r || r != Roblox.Client._installHost) throw "wrong InstallHost: (plugins):  " + r + "  (servers):  " + Roblox.Client._installHost;
        return i
    } catch (f) {
        return Roblox.Client.ReleaseLauncher(i, n, !1), null
    }
}, Roblox.Client.isIDE = function() {
    if (Roblox.Client._isIDE == null && (Roblox.Client._isIDE = !1, Roblox.Client._isRobloxBrowser = !1, window.external)) try {
        window.external.IsRobloxAppIDE !== undefined && (Roblox.Client._isIDE = window.external.IsRobloxAppIDE, Roblox.Client._isRobloxBrowser = !0)
    } catch (n) {}
    return Roblox.Client._isIDE
}, Roblox.Client.isRobloxBrowser = function() {
    return Roblox.Client.isIDE(), Roblox.Client._isRobloxBrowser
}, Roblox.Client.robloxBrowserInstallHost = function() {
    if (window.external) try {
        return window.external.InstallHost
    } catch (n) {}
    return ""
}, Roblox.Client.IsRobloxProxyInstalled = function() {
    var t = Roblox.Client.CreateLauncher(!1),
        n = !1;
    return (t != null && (n = !0), Roblox.Client.ReleaseLauncher(t, !1, !1), n || Roblox.Client.isRobloxBrowser()) ? !0 : !1
}, Roblox.Client.IsRobloxInstalled = function() {
    try {
        var t = Roblox.Client.CreateLauncher(!1),
            n = Roblox.Client.GetInstallHost(t);
        return Roblox.Client.ReleaseLauncher(t, !1, !1), n == Roblox.Client._installHost
    } catch (i) {
        return Roblox.Client.isRobloxBrowser() ? (n = Roblox.Client.robloxBrowserInstallHost(), n == Roblox.Client._installHost) : !1
    }
}, Roblox.Client.SetStartInHiddenMode = function(n) {
    try {
        var t = Roblox.Client.CreateLauncher(!1);
        if (t !== null) return t.SetStartInHiddenMode(n), Roblox.Client._hiddenModeEnabled = n, !0
    } catch (i) {}
    return !1
}, Roblox.Client.UnhideApp = function() {
    try {
        if (Roblox.Client._hiddenModeEnabled) {
            var n = Roblox.Client.CreateLauncher(!1);
            n.UnhideApp()
        }
    } catch (t) {}
}, Roblox.Client.Update = function() {
    try {
        var n = Roblox.Client.CreateLauncher(!1);
        n.Update(), Roblox.Client.ReleaseLauncher(n, !1, !1)
    } catch (t) {
        alert("Error updating: " + t)
    }
}, Roblox.Client.WaitForRoblox = function(n) {
    if (Roblox.Client._skip) return window.location = Roblox.Client._skip, !1;
    if (Roblox.Client._continuation = n, Roblox.Client._cancelled = !1, !Roblox.Client.IsRobloxProxyInstalled() && Roblox.Client.ImplementsProxy) {
        Roblox.InstallationInstructions.show(), Roblox.Client.runInstallABTest();
        var t = "Windows";
        return navigator.appVersion.indexOf("Mac") != -1 && (t = "Mac"), typeof _gaq != typeof undefined && (_gaq.push(["_trackEvent", "Install Begin", t]), _gaq.push(["b._trackEvent", "Install Begin", t])), RobloxEventManager.triggerEvent("rbx_evt_install_begin", {
            os: t
        }), window.chrome && (window.location.hash = "#chromeInstall", $.cookie("chromeInstall", n.toString().replace(/play_placeId/, play_placeId.toString()))), window.setTimeout(function() {
            Roblox.Client._ontimer()
        }, 1e3), tryToDownload(), !0
    }
    return Roblox.Client._continuation(), !1
}, Roblox.Client.ResumeTimer = function(n) {
    Roblox.Client._continuation = n, Roblox.Client._cancelled = !1, window.setTimeout(function() {
        Roblox.Client._ontimer()
    }, 0)
}, Roblox.Client.Refresh = function() {
    try {
        navigator.plugins.refresh(!1)
    } catch (n) {}
}, Roblox.Client._onCancel = function() {
    return Roblox.InstallationInstructions.hide(), Roblox.Client._cancelled = !0, !1
}, Roblox.Client._ontimer = function() {
    Roblox.Client._cancelled || (Roblox.Client.Refresh(), Roblox.Client.IsRobloxProxyInstalled() ? (Roblox.InstallationInstructions.hide(), window.setTimeout(function() {
        window.chrome && window.location.hash == "#chromeInstall" && (window.location.hash = "", $.cookie("chromeInstall", null))
    }, 5e3), Roblox.Client._continuation(), Roblox.Client._installSuccess && Roblox.Client._installSuccess()) : window.setTimeout(function() {
        Roblox.Client._ontimer()
    }, 1e3))
};

; /// InstallationInstructions.js
typeof Roblox == "undefined" && (Roblox = {}), Roblox.InstallationInstructions = function() {
    function i() {
        var t, i, r;
        n(), t = 0, i = $(".InstallInstructionsImage"), i && typeof $(i).attr("modalwidth") != "undefined" && (t = $(".InstallInstructionsImage").attr("modalwidth")), t > 0 ? (r = ($(window).width() - (t - 10)) / 2, $("#InstallationInstructions").modal({
            escClose: !0,
            opacity: 50,
            minWidth: t,
            maxWidth: t,
            overlayCss: {
                backgroundColor: "#000"
            },
            position: [20, r]
        })) : $("#InstallationInstructions").modal({
            escClose: !0,
            opacity: 50,
            maxWidth: $(window).width() / 2,
            minWidth: $(window).width() / 2,
            overlayCss: {
                backgroundColor: "#000"
            },
            position: [20, "25%"]
        })
    }

    function r() {
        $.modal.close()
    }

    function n() {
        var n = $(".InstallInstructionsImage");
        navigator.userAgent.match(/Mac OS X 10[_|\.]5/) ? n && typeof $(n).attr("oldmacdelaysrc") != "undefined" && $(".InstallInstructionsImage").attr("src", $(".InstallInstructionsImage").attr("oldmacdelaysrc")) : n && typeof $(n).attr("delaysrc") != "undefined" && $(".InstallInstructionsImage").attr("src", $(".InstallInstructionsImage").attr("delaysrc"))
    }
    return {
        show: i,
        hide: r
    }
}();

; /// MadStatus.js
MadStatus = {
    running: !1,
    init: function(n, t, i, r) {
        MadStatus.running && MadStatus.stop(), MadStatus.updateInterval = i ? i : 2e3, MadStatus.fadeInterval = r ? r : 1e3, MadStatus.timeout = null, MadStatus.running = !0, MadStatus.field = n, MadStatus.backBuffer = t, MadStatus.field.show(), MadStatus.backBuffer.hide()
    },
    participle: ["Accelerating", "Aggregating", "Allocating", "Aquiring", "Automating", "Backtracing", "Bloxxing", "Bootstraping", "Calibrating", "Correlating", "De-noobing", "De-ionizing", "Deriving", "Energizing", "Filtering", "Generating", "Indexing", "Loading", "Noobing", "Optimizing", "Oxidizing", "Queueing", "Parsing", "Processing", "Rasterizing", "Reading", "Registering", "Re-routing", "Resolving", "Sampling", "Updating", "Writing"],
    modifier: ["Blox", "Count Zero", "Cylon", "Data", "Ectoplasm", "Encryption", "Event", "Farnsworth", "Bebop", "Flux Capacitor", "Fusion", "Game", "Gibson", "Host", "Mainframe", "Metaverse", "Nerf Herder", "Neutron", "Noob", "Photon", "Profile", "Script", "Skynet", "TARDIS", "Virtual"],
    subject: ["Analogs", "Blocks", "Cannon", "Channels", "Core", "Database", "Dimensions", "Directives", "Engine", "Files", "Gear", "Index", "Layer", "Matrix", "Paradox", "Parameters", "Parsecs", "Pipeline", "Players", "Ports", "Protocols", "Reactors", "Sphere", "Spooler", "Stream", "Switches", "Table", "Targets", "Throttle", "Tokens", "Torpedoes", "Tubes"],
    newLib: function() {
        return libString = this.participle[Math.floor(Math.random() * this.participle.length)] + " " + this.modifier[Math.floor(Math.random() * this.modifier.length)] + " " + this.subject[Math.floor(Math.random() * this.subject.length)] + "..."
    },
    start: function() {
        MadStatus.timeout == null && (MadStatus.timeout = setInterval("MadStatus.update()", MadStatus.updateInterval), MadStatus.running = !0)
    },
    stop: function(n) {
        clearInterval(MadStatus.timeout), MadStatus.timeout = null, MadStatus.field[0].innerHTML = typeof n != typeof undefined ? n : "", MadStatus.running = !1
    },
    manualUpdate: function(n, t, i) {
        MadStatus.timeout && MadStatus.stop(), this.update(n, i), t && setTimeout("MadStatus.start()", 1e3)
    },
    update: function(n, t) {
        (MadStatus.backBuffer[0].innerHTML = typeof n != typeof undefined ? n : this.newLib(), typeof noAnim == typeof undefined || t != !1) && (this.field.hide(), this.backBuffer.fadeIn(this.fadeInterval + 2, function() {
            MadStatus.field[0].innerHTML = MadStatus.backBuffer[0].innerHTML, MadStatus.field.show(), MadStatus.backBuffer.hide()
        }))
    }
};

; /// PlaceLauncher.js
var RBX = {},
    RobloxLaunchStates = {
        StartingServer: "StartingServer",
        StartingClient: "StartingClient",
        Upgrading: "Upgrading",
        None: "None"
    },
    RobloxLaunch = {
        launchGamePage: null,
        timer: null,
        clientMetricType: null,
        launcher: null,
        googleAnalyticsCallback: function() {
            RobloxLaunch._GoogleAnalyticsCallback && RobloxLaunch._GoogleAnalyticsCallback()
        },
        state: RobloxLaunchStates.None,
        secureAuthenticate: !1
    },
    RobloxPlaceLauncherService = {
        LogJoinClick: function() {
            $.get("/Game/Placelauncher.ashx", {
                request: "LogJoinClick"
            })
        },
        RequestGame: function(n, t, i, r, u, f) {
            i = i !== null && i !== undefined ? i : "", $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "RequestGame",
                placeId: n,
                isPartyLeader: t,
                gender: i
            }, function(n) {
                n.Error ? u(n.Error, f) : r(n, f)
            })
        },
        RequestPlayWithParty: function(n, t, i, r, u, f) {
            $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "RequestPlayWithParty",
                placeId: n,
                partyGuid: t,
                gameId: i
            }, function(n) {
                n.Error ? u(n.Error, f) : r(n, f)
            })
        },
        RequestGroupBuildGame: function(n, t, i, r) {
            $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "RequestGroupBuildGame",
                placeId: n
            }, function(n) {
                n.Error ? i(n.Error, r) : t(n, r)
            })
        },
        RequestFollowUser: function(n, t, i, r) {
            $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "RequestFollowUser",
                userId: n
            }, function(n) {
                n.Error ? i(n.Error, r) : t(n, r)
            })
        },
        RequestGameJob: function(n, t, i, r, u, f) {
            $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "RequestGameJob",
                placeId: n,
                gameId: t,
                gameJobId: i
            }, function(n) {
                n.Error ? u(n.Error, f) : r(n, f)
            })
        },
        CheckGameJobStatus: function(n, t, i, r) {
            $.getJSON("/Game/PlaceLauncher.ashx", {
                request: "CheckGameJobStatus",
                jobId: n
            }, function(n) {
                n.Error ? i(n.Error, r) : t(n, r)
            })
        }
    };
RobloxLaunch.RequestPlayWithParty = function(n, t, i, r) {
    RobloxPlaceLauncherService.LogJoinClick(), RobloxLaunch.timer = new Date, RobloxLaunch.state = RobloxLaunchStates.None, RobloxLaunch.clientMetricType = "WebPlay", checkRobloxInstall() && (RobloxLaunch.launcher === null && (RobloxLaunch.launcher = new RBX.PlaceLauncher(n)), RobloxLaunch.launcher.RequestPlayWithParty(t, i, r))
}, RobloxLaunch.RequestGame = function(n, t, i) {
    RobloxPlaceLauncherService.LogJoinClick(), RobloxLaunch.timer = new Date, RobloxLaunch.state = RobloxLaunchStates.None, RobloxLaunch.clientMetricType = "WebPlay", checkRobloxInstall() && (RobloxLaunch.launcher === null && (RobloxLaunch.launcher = new RBX.PlaceLauncher(n)), RobloxLaunch.launcher.RequestGame(t, i))
}, RobloxLaunch.RequestGroupBuildGame = function(n, t) {
    RobloxPlaceLauncherService.LogJoinClick(), RobloxLaunch.timer = new Date, RobloxLaunch.state = RobloxLaunchStates.None, RobloxLaunch.clientMetricType = "WebPlay", checkRobloxInstall() && (RobloxLaunch.launcher === null && (RobloxLaunch.launcher = new RBX.PlaceLauncher(n)), RobloxLaunch.launcher.RequestGroupBuildGame(t))
}, RobloxLaunch.RequestGameJob = function(n, t, i, r) {
    RobloxPlaceLauncherService.LogJoinClick(), RobloxLaunch.timer = new Date, RobloxLaunch.state = RobloxLaunchStates.None, RobloxLaunch.clientMetricType = "WebJoin", checkRobloxInstall() && (RobloxLaunch.launcher === null && (RobloxLaunch.launcher = new RBX.PlaceLauncher(n)), RobloxLaunch.launcher.RequestGameJob(t, i, r))
}, RobloxLaunch.RequestFollowUser = function(n, t) {
    RobloxPlaceLauncherService.LogJoinClick(), RobloxLaunch.timer = new Date, RobloxLaunch.state = RobloxLaunchStates.None, RobloxLaunch.clientMetricType = "WebFollow", checkRobloxInstall() && (RobloxLaunch.launcher === null && (RobloxLaunch.launcher = new RBX.PlaceLauncher(n)), RobloxLaunch.launcher.RequestFollowUser(t))
}, RobloxLaunch.StartGame = function(n, t, i, r, u) {
    var o, f, e, s;
    RobloxLaunch.secureAuthenticate && (i = i.replace("http://", "https://")), n = typeof RobloxLaunch.SeleniumTestMode == "undefined" ? n + "&testmode=false" : n + "&testmode=true", typeof urchinTracker != "undefined" && urchinTracker("Visit/Try/" + t), RobloxLaunch.state = RobloxLaunchStates.StartingClient, RobloxLaunch.googleAnalyticsCallback !== null && RobloxLaunch.googleAnalyticsCallback(), o = null;
    try {
        if (typeof window.external != "undefined" && window.external.IsRobloxABApp) window.external.StartGame(r, i, n);
        else if (typeof window.external != "undefined" && window.external.IsRoblox2App && (n.indexOf("visit") != -1 || u)) window.external.StartGame(r, i, n);
        else if (o = "RobloxProxy/", f = Roblox.Client.CreateLauncher(!0), f) {
            o = "RobloxProxy/StartGame/";
            try {
                try {
                    window.ActiveXObject ? f.AuthenticationTicket = r : f.Put_AuthenticationTicket(r), u && f.SetEditMode()
                } catch (a) {}
                try {
                    if (Roblox.Client._silentModeEnabled) f.SetSilentModeEnabled(!0), Roblox.VideoPreRoll.videoInitialized && Roblox.VideoPreRoll.isPlaying() && Roblox.Client.SetStartInHiddenMode(!0), f.StartGame(i, n), RobloxLaunch.CheckGameStarted(f);
                    else throw "silent mode is disabled, fall back";
                } catch (a) {
                    if (f.StartGame(i, n), Roblox.Client._bringAppToFrontEnabled) try {
                        f.BringAppToFront()
                    } catch (h) {}
                    Roblox.Client.ReleaseLauncher(f, !0, !1), $.modal.close()
                }
            } catch (a) {
                Roblox.Client.ReleaseLauncher(f, !0, !1);
                throw a;
            }
        } else {
            try {
                parent.playFromUrl(n);
                return
            } catch (l) {}
            if (Roblox.Client.isRobloxBrowser()) try {
                window.external.StartGame(r, i, n)
            } catch (l) {
                throw "window.external fallback failed, Roblox must not be installed or IE cannot access ActiveX";
            } else throw "launcher is null or undefined and external is missing";
            RobloxLaunch.state = RobloxLaunchStates.None, $.modal.close()
        }
    } catch (a) {
        if (e = a.message, e === "User cancelled" && typeof urchinTracker != "undefined") return urchinTracker("Visit/UserCancelled/" + t), !1;
        try {
            s = new ActiveXObject("Microsoft.XMLHTTP")
        } catch (c) {
            e = "FailedXMLHTTP/" + e
        }
        return Roblox.Client.isRobloxBrowser() ? typeof urchinTracker != "undefined" && urchinTracker("Visit/Fail/" + o + encodeURIComponent(e)) : (typeof urchinTracker != "undefined" && urchinTracker("Visit/Redirect/" + o + encodeURIComponent(e)), window.location = RobloxLaunch.launchGamePage), !1
    }
    return typeof urchinTracker != "undefined" && urchinTracker("Visit/Success/" + t), !0
}, RobloxLaunch.CheckGameStarted = function(n) {
    function r() {
        var e = !1;
        try {
            if (i || (i = window.ActiveXObject ? n.IsGameStarted : n.Get_GameStarted()), i && !Roblox.VideoPreRoll.isPlaying()) {
                if (MadStatus.stop("Connecting to Players..."), RobloxLaunch.state = RobloxLaunchStates.None, $.modal.close(), t._cancelled = !0, Roblox.Client._hiddenModeEnabled && Roblox.Client.UnhideApp(), Roblox.Client._bringAppToFrontEnabled) try {
                    n.BringAppToFront()
                } catch (f) {}
                Roblox.Client.ReleaseLauncher(n, !0, !1)
            } else t._cancelled || setTimeout(r, 1e3)
        } catch (u) {
            t._cancelled || setTimeout(r, 1e3)
        }
    }
    var t = RobloxLaunch.launcher,
        i;
    t === null && (t = new RBX.PlaceLauncher("PlaceLauncherStatusPanel"), t._showDialog(), t._updateStatus(0)), i = !1, r()
}, RobloxLaunch.CheckRobloxInstall = function(n) {
    if (Roblox.Client.IsRobloxInstalled()) return Roblox.Client.Update(), !0;
    window.location = n
}, RBX.PlaceLauncher = function(n) {
    this._cancelled = !1, this._popupID = n, this._popup = $("#" + n)
}, RBX.PlaceLauncher.prototype = {
    _showDialog: function() {
        this._cancelled = !1, _popupOptions = {
            escClose: !0,
            opacity: 80,
            overlayCss: {
                backgroundColor: "#000"
            }
        }, this._popupID == "PlaceLauncherStatusPanel" && (Roblox.VideoPreRoll && Roblox.VideoPreRoll.showVideoPreRoll && !Roblox.VideoPreRoll.isExcluded() ? (this._popup = $("#videoPrerollPanel"), _popupOptions.onShow = function(n) {
            Roblox.VideoPreRoll.correctIEModalPosition(n), Roblox.VideoPreRoll.start()
        }, _popupOptions.onClose = function() {
            Roblox.VideoPreRoll.close()
        }, _popupOptions.closeHTML = '<a href="#" class="ImageButton closeBtnCircle_35h ABCloseCircle VprCloseButton"></a>') : (this._popup = $("#" + this._popupID), _popupOptions.onClose = function() {
            Roblox.VideoPreRoll.logVideoPreRoll(), $.modal.close()
        })), this._popup.modal(_popupOptions);
        var n = this;
        $(".CancelPlaceLauncherButton").click(function() {
            n.CancelLaunch()
        }), $(".CancelPlaceLauncherButton").show()
    },
    _reportDuration: function(n, t) {
        $.ajax({
            type: "GET",
            async: !0,
            cache: !1,
            timeout: 5e4,
            url: "/Game/JoinRate.ashx?c=" + RobloxLaunch.clientMetricType + "&r=" + t + "&d=" + n,
            success: function() {}
        })
    },
    _onGameStatus: function(n) {
        var r, i, t;
        if (this._cancelled) {
            r = +new Date - RobloxLaunch.timer.getTime(), this._reportDuration(r, "Cancel");
            return
        }
        if (this._updateStatus(n.status), n.status === 2) RobloxLaunch.StartGame(n.joinScriptUrl, "Join", n.authenticationUrl, n.authenticationTicket), i = +new Date - RobloxLaunch.timer.getTime(), this._reportDuration(i, "Success");
        else if (n.status < 2 || n.status === 6) {
            var f = function(n, t) {
                    t._onGameStatus(n)
                },
                e = function(n, t) {
                    t._onGameError(n)
                },
                o = this,
                u = function() {
                    RobloxPlaceLauncherService.CheckGameJobStatus(n.jobId, f, e, o)
                };
            window.setTimeout(u, 2e3)
        } else n.status === 4 && (t = +new Date - RobloxLaunch.timer.getTime(), this._reportDuration(t, "Failure"))
    },
    _updateStatus: function(n) {
        MadStatus.running || (MadStatus.init($(this._popup).find(".MadStatusField"), $(this._popup).find(".MadStatusBackBuffer"), 2e3, 800), MadStatus.start());
        switch (n) {
            case 0:
                break;
            case 1:
                MadStatus.manualUpdate("A server is loading the game...", !0);
                break;
            case 2:
                MadStatus.manualUpdate("The server is ready. Joining the game...", !0);
                break;
            case 3:
                MadStatus.manualUpdate("Joining games is temporarily disabled while we upgrade. Please try again soon.", !1);
                break;
            case 4:
                MadStatus.manualUpdate("An error occurred. Please try again later.", !1);
                break;
            case 5:
                MadStatus.manualUpdate("The game you requested has ended.", !1);
                break;
            case 6:
                MadStatus.manualUpdate("The game you requested is currently full. Waiting for an opening...", !0, !1);
                break;
            case 7:
                MadStatus.manualUpdate("Roblox is updating. Please wait...", !0);
                break;
            case 8:
                MadStatus.manualUpdate("Requesting a server", !0);
                break;
            default:
                MadStatus.stop("Connecting to Players...")
        }
        $(this._popup).find(".MadStatusStarting").css("display", "none"), $(this._popup).find(".MadStatusSpinner").css("visibility", n === 3 || n === 4 || n === 5 ? "hidden" : "visible")
    },
    _onGameError: function() {
        this._updateStatus(4)
    },
    _startUpdatePolling: function(n) {
        var t, i;
        try {
            if (RobloxLaunch.state = RobloxLaunchStates.Upgrading, t = Roblox.Client.CreateLauncher(!0), i = window.ActiveXObject ? t.IsUpToDate : t.Get_IsUpToDate(), i || i === undefined) {
                try {
                    t.PreStartGame()
                } catch (e) {}
                Roblox.Client.ReleaseLauncher(t, !0, !1), RobloxLaunch.state = RobloxLaunchStates.StartingServer, n();
                return
            }
            var f = function(t, i, r) {
                    r._onUpdateStatus(t, i, n)
                },
                u = function(n, t) {
                    t._onUpdateError(n)
                },
                r = this;
            this.CheckUpdateStatus(f, u, t, n, r)
        } catch (e) {
            Roblox.Client.ReleaseLauncher(t, !0, !1), n()
        }
    },
    _onUpdateStatus: function(n, t, i) {
        if (!this._cancelled)
            if (this._updateStatus(n), n === 8) Roblox.Client.ReleaseLauncher(t, !0, !0), Roblox.Client.Refresh(), RobloxLaunch.state = RobloxLaunchStates.StartingServer, i();
            else if (n === 7) {
            var f = function(n, t, r) {
                    r._onUpdateStatus(n, t, i)
                },
                e = function(n, t) {
                    t._onUpdateError(n)
                },
                r = this,
                u = function() {
                    r.CheckUpdateStatus(f, e, t, i, r)
                };
            window.setTimeout(u, 2e3)
        } else alert("Unknown status from CheckUpdateStatus")
    },
    _onUpdateError: function() {
        this._updateStatus(2)
    },
    CheckUpdateStatus: function(n, t, i, r, u) {
        try {
            if (i.PreStartGame(), window.ActiveXObject) var f = i.IsUpToDate;
            else f = i.Get_IsUpToDate();
            f || f === undefined ? n(8, i, u) : n(7, i, u)
        } catch (e) {
            n(8, i, u)
        }
    },
    RequestGame: function(n, t) {
        var r;
        this._showDialog();
        var f = function(n, t) {
                t._onGameStatus(n)
            },
            u = function(n, t) {
                t._onGameError(n)
            },
            e = this,
            i = !1;
        return typeof Party != "undefined" && typeof Party.AmILeader == "function" && (i = Party.AmILeader()), r = function() {
            RobloxPlaceLauncherService.RequestGame(n, i, t, f, u, e)
        }, this._startUpdatePolling(r), !1
    },
    RequestPlayWithParty: function(n, t, i) {
        this._showDialog();
        var f = function(n, t) {
                t._onGameStatus(n)
            },
            e = function(n, t) {
                t._onGameError(n)
            },
            r = this,
            u = function() {
                RobloxPlaceLauncherService.RequestPlayWithParty(n, t, i, f, e, r)
            };
        return this._startUpdatePolling(u), !1
    },
    RequestGroupBuildGame: function(n) {
        this._showDialog();
        var r = function(n, t) {
                t._onGameStatus(n, !0)
            },
            u = function(n, t) {
                t._onGameError(n)
            },
            t = this,
            i = function() {
                RobloxPlaceLauncherService.RequestGroupBuildGame(n, r, u, t)
            };
        return this._startUpdatePolling(i), !1
    },
    RequestFollowUser: function(n) {
        this._showDialog();
        var r = function(n, t) {
                t._onGameStatus(n)
            },
            u = function(n, t) {
                t._onError(n)
            },
            t = this,
            i = function() {
                RobloxPlaceLauncherService.RequestFollowUser(n, r, u, t)
            };
        return this._startUpdatePolling(i), !1
    },
    RequestGameJob: function(n, t, i) {
        this._showDialog();
        var f = function(n, t) {
                t._onGameStatus(n)
            },
            e = function(n, t) {
                t._onGameError(n)
            },
            r = this,
            u = function() {
                RobloxPlaceLauncherService.RequestGameJob(n, t, i, f, e, r)
            };
        return this._startUpdatePolling(u), !1
    },
    CancelLaunch: function() {
        return this._cancelled = !0, $.modal.close(), !1
    },
    dispose: function() {
        RBX.PlaceLauncher.callBaseMethod(this, "dispose")
    }
};

; /// VideoPreRoll.js
function openVideoPreroll2(n) {
    Roblox.VideoPreRoll.test(n)
}

function flashCheck(n) {
    var i = !1,
        t, r;
    if (window.ActiveXObject) try {
        t = new ActiveXObject("ShockwaveFlash.ShockwaveFlash." + n), i = !0
    } catch (u) {} else navigator.plugins && navigator.mimeTypes.length > 0 && (t = navigator.plugins["Shockwave Flash"], t && (r = navigator.plugins["Shockwave Flash"].description.replace(/.*\s(\d+\.\d+).*/, "$1"), r >= n && (i = !0)));
    return i
}
typeof Roblox == "undefined" && (Roblox = {}), Roblox.VideoPreRoll = {
    newValue: "",
    showVideoPreRoll: !1,
    videoInitialized: !1,
    videoStarted: !1,
    videoCompleted: !1,
    videoSkipped: !1,
    videoCancelled: !1,
    videoErrored: !1,
    videoOptions: {
        key: "integration_test",
        companionId: "videoPrerollCompanionAd"
    },
    myvpaidad: null,
    loadingBarMaxTime: 3e4,
    loadingBarCurrentTime: 0,
    loadingBarIntervalID: 0,
    loadingBarID: "videoPrerollLoadingBar",
    loadingBarInnerID: "videoPrerollLoadingBarCompleted",
    loadingBarPercentageID: "videoPrerollLoadingPercent",
    videoLoadingTimeout: 7e3,
    videoPlayingTimeout: 23e3,
    videoLogNote: "",
    logsEnabled: !1,
    excludedPlaceIds: "",
    specificAdOnPlacePageEnabled: !1,
    specificAdOnPlacePageId: 0,
    specificAdOnPlacePageCategory: "",
    checkEligibility: function() {
        Roblox.VideoPreRoll.showVideoPreRoll && (flashCheck(8) ? typeof __adaptv__ == "undefined" ? (Roblox.VideoPreRoll.videoLogNote = "NoAdapTv", Roblox.VideoPreRoll.showVideoPreRoll = !1) : Roblox.Client.IsRobloxInstalled() ? Roblox.Client.isIDE() ? (Roblox.VideoPreRoll.videoLogNote = "RobloxStudio", Roblox.VideoPreRoll.showVideoPreRoll = !1) : Roblox.Client.isRobloxBrowser() ? (Roblox.VideoPreRoll.videoLogNote = "RobloxPlayer", Roblox.VideoPreRoll.showVideoPreRoll = !1) : window.chrome && window.location.hash == "#chromeInstall" && (Roblox.VideoPreRoll.showVideoPreRoll = !1) : Roblox.VideoPreRoll.showVideoPreRoll = !1 : (Roblox.VideoPreRoll.videoLogNote = "NoFlash", Roblox.VideoPreRoll.showVideoPreRoll = !1))
    },
    isExcluded: function() {
        var t, n;
        if (Roblox.VideoPreRoll.showVideoPreRoll && Roblox.VideoPreRoll.excludedPlaceIds !== "" && (t = Roblox.VideoPreRoll.excludedPlaceIds.split(","), typeof play_placeId != "undefined"))
            for (n = 0; n < t.length; n++)
                if (play_placeId == t[n]) return Roblox.VideoPreRoll.videoLogNote = "ExcludedPlace", !0;
        return !1
    },
    start: function() {
        var i, r, t, n;
        this.videoInitialized = !0, this.videoStarted = !1, this.videoCancelled = !1, this.videoCompleted = !1, this.videoSkipped = !1, this.loadingBarCurrentTime = 0, this.videoLogNote = "", Roblox.VideoPreRoll.specificAdOnPlacePageEnabled && typeof play_placeId != "undefined" && (i = "," + Roblox.VideoPreRoll.specificAdOnPlacePageCategory, play_placeId == Roblox.VideoPreRoll.specificAdOnPlacePageId && Roblox.VideoPreRoll.videoOptions.categories.indexOf(i) == -1 && (Roblox.VideoPreRoll.videoOptions.categories += i)), r = __adaptv__, this.myvpaidad = new r.ads.vpaid.VPAIDAd("videoPrerollMainDiv"), t = 1e3, LoadingBar.init(this.loadingBarID, this.loadingBarInnerID, this.loadingBarPercentageID), this.loadingBarIntervalID = setInterval(function() {
            Roblox.VideoPreRoll.loadingBarCurrentTime += t, LoadingBar.update(Roblox.VideoPreRoll.loadingBarID, Roblox.VideoPreRoll.loadingBarCurrentTime / Roblox.VideoPreRoll.loadingBarMaxTime)
        }, t), n = r.ads.vpaid.VPAIDEvent;
        this.myvpaidad.on(n.AdLoaded, function(n) {
            Roblox.VideoPreRoll._onVideoLoaded(n)
        });
        this.myvpaidad.on(n.AdStarted, function(n) {
            Roblox.VideoPreRoll._onVideoStart(n)
        });
        this.myvpaidad.on(n.AdStopped, function(n) {
            Roblox.VideoPreRoll._onVideoComplete(n)
        });
        this.myvpaidad.on(n.AdError, function(n) {
            Roblox.VideoPreRoll._onVideoError(n)
        });
        try {
            this.myvpaidad.initAd(391, 312, this.videoOptions)
        } catch (u) {
            f()
        }
    },
    error: function() {
        clearInterval(loadingBarInterval)
    },
    cancel: function() {
        this.videoCancelled = !0, $.modal.close()
    },
    skip: function() {
        this.videoCompleted = !0, this.videoSkipped = !0, this.showVideoPreRoll = !1
    },
    close: function() {
        MadStatus.running && MadStatus.stop(""), RobloxLaunch.launcher && (RobloxLaunch.launcher._cancelled = !0), clearInterval(this.loadingBarIntervalID), LoadingBar.dispose(this.loadingBarID);
        try {
            this.myvpaidad.stopAd()
        } catch (n) {}
        this.isPlaying() && (this.videoCancelled = !0), $.modal.close(), this.logVideoPreRoll()
    },
    _onVideoError: function f() {
        this.videoCompleted = !0, this.videoErrored = !0
    },
    _onVideoLoaded: function(n) {
        try {
            this.myvpaidad.startAd()
        } catch (t) {
            f(n)
        }
    },
    _onVideoStart: function() {
        this.videoStarted = !0
    },
    _onVideoComplete: function() {
        this.videoStarted && this.videoCancelled == !1 && (this.videoCompleted = !0, this.showVideoPreRoll = !1, this.newValue != "" && $.cookie("RBXVPR", this.newValue, 180))
    },
    logVideoPreRoll: function() {
        if (Roblox.VideoPreRoll.logsEnabled) {
            var n = "";
            if (Roblox.VideoPreRoll.videoCompleted) n = "Complete", Roblox.VideoPreRoll.videoLogNote == "" && (Roblox.VideoPreRoll.videoLogNote = "NoTimeout"), Roblox.VideoPreRoll.logsEnabled = !1;
            else if (Roblox.VideoPreRoll.videoCancelled) n = "Cancelled", Roblox.VideoPreRoll.videoLogNote = RobloxLaunch.state;
            else if (Roblox.VideoPreRoll.videoInitialized == !1 && Roblox.VideoPreRoll.videoLogNote != "") n = "Failed", Roblox.VideoPreRoll.logsEnabled = !1;
            else return;
            GoogleAnalyticsEvents.FireEvent(["PreRoll", n, Roblox.VideoPreRoll.videoLogNote])
        }
    },
    isPlaying: function() {
        return Roblox.VideoPreRoll.videoInitialized ? (Roblox.VideoPreRoll.videoInitialized && !Roblox.VideoPreRoll.videoStarted && Roblox.VideoPreRoll.loadingBarCurrentTime > Roblox.VideoPreRoll.videoLoadingTimeout && (Roblox.VideoPreRoll.videoCompleted = !0, Roblox.VideoPreRoll.videoLogNote = "LoadingTimeout"), Roblox.VideoPreRoll.videoStarted && !Roblox.VideoPreRoll.videoCompleted && Roblox.VideoPreRoll.loadingBarCurrentTime > Roblox.VideoPreRoll.videoPlayingTimeout && (Roblox.VideoPreRoll.videoCompleted = !0, Roblox.VideoPreRoll.videoLogNote = "PlayingTimeout"), !Roblox.VideoPreRoll.videoCompleted) : !1
    },
    correctIEModalPosition: function(n) {
        if (n.container.innerHeight() <= 30) {
            var i = $("#videoPrerollPanel"),
                t = -Math.floor(i.innerHeight() / 2);
            i.css({
                position: "relative",
                top: t + "px"
            }), n.container.find(".VprCloseButton").css({
                top: t - 10 + "px",
                "z-index": "1003"
            })
        }
    },
    test: function() {
        _popupOptions = {
            escClose: !0,
            opacity: 80,
            overlayCss: {
                backgroundColor: "#000"
            },
            onShow: function(n) {
                Roblox.VideoPreRoll.correctIEModalPosition(n), Roblox.VideoPreRoll.start()
            },
            onClose: function() {
                Roblox.VideoPreRoll.close()
            },
            closeHTML: '<a href="#" class="ImageButton closeBtnCircle_35h ABCloseCircle VprCloseButton"></a>'
        }, $("#videoPrerollPanel").modal(_popupOptions), MadStatus.running || (MadStatus.init($("#videoPrerollPanel").find(".MadStatusField"), $("#videoPrerollPanel").find(".MadStatusBackBuffer"), 2e3, 800), MadStatus.start()), $("#videoPrerollPanel").find(".MadStatusStarting").css("display", "none"), $("#videoPrerollPanel").find(".MadStatusSpinner").css("visibility", status === 3 || status === 4 || status === 5 ? "hidden" : "visible")
    }
};
var LoadingBar = {
    bars: [],
    init: function(n, t, i, r) {
        var u = this.get(n);
        u == null && (u = {}), u.barID = n, u.innerBarID = t, u.percentageID = i, typeof r == "undefined" && (u.percentComplete = 0), this.bars.push(u), this.update(n, u.percentComplete)
    },
    get: function(n) {
        for (var t = 0; t < this.bars.length; t++)
            if (this.bars[t].barID == n) return this.bars[t];
        return null
    },
    dispose: function(n) {
        for (var t = 0; t < this.bars.length; t++) this.bars[t].barID == n && this.bars.splice(t, 1)
    },
    update: function(n, t) {
        var i = this.get(n),
            u, r;
        i && (t > 1 && (t = 1), u = $("#" + n).width(), r = Math.round(u * t), $("#" + i.innerBarID).animate({
            width: r
        }, 200, "swing"), i.percentageID && $("#" + i.percentageID).length > 0 && $("#" + i.percentageID).html(Math.round(t * 100) + "%"), i.percentComplete = t)
    }
};
// end roblox.js