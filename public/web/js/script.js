!(function (e, t, n) {
    function i(e, t) {
        return typeof e === t;
    }
    function o(e) {
        var t = _.className,
            n = b._config.classPrefix || "";
        if ((S && (t = t.baseVal), b._config.enableJSClass)) {
            var i = new RegExp("(^|\\s)" + n + "no-js(\\s|$)");
            t = t.replace(i, "$1" + n + "js$2");
        }
        b._config.enableClasses && ((t += " " + n + e.join(" " + n)), S ? (_.className.baseVal = t) : (_.className = t));
    }
    function s(e, t) {
        if ("object" == typeof e) for (var n in e) k(e, n) && s(n, e[n]);
        else {
            var i = (e = e.toLowerCase()).split("."),
                r = b[i[0]];
            if ((2 == i.length && (r = r[i[1]]), void 0 !== r)) return b;
            (t = "function" == typeof t ? t() : t),
                1 == i.length ? (b[i[0]] = t) : (!b[i[0]] || b[i[0]] instanceof Boolean || (b[i[0]] = new Boolean(b[i[0]])), (b[i[0]][i[1]] = t)),
                o([(t && 0 != t ? "" : "no-") + i.join("-")]),
                b._trigger(e, t);
        }
        return b;
    }
    function r() {
        return "function" != typeof t.createElement ? t.createElement(arguments[0]) : S ? t.createElementNS.call(t, "http://www.w3.org/2000/svg", arguments[0]) : t.createElement.apply(t, arguments);
    }
    function a(e, n, i, o) {
        var s,
            a,
            l,
            c,
            d = "modernizr",
            u = r("div"),
            h = (function () {
                var e = t.body;
                return e || ((e = r(S ? "svg" : "body")).fake = !0), e;
            })();
        if (parseInt(i, 10)) for (; i--; ) ((l = r("div")).id = o ? o[i] : d + (i + 1)), u.appendChild(l);
        return (
            ((s = r("style")).type = "text/css"),
                (s.id = "s" + d),
                (h.fake ? h : u).appendChild(s),
                h.appendChild(u),
                s.styleSheet ? (s.styleSheet.cssText = e) : s.appendChild(t.createTextNode(e)),
                (u.id = d),
            h.fake && ((h.style.background = ""), (h.style.overflow = "hidden"), (c = _.style.overflow), (_.style.overflow = "hidden"), _.appendChild(h)),
                (a = n(u, e)),
                h.fake ? (h.parentNode.removeChild(h), (_.style.overflow = c), _.offsetHeight) : u.parentNode.removeChild(u),
                !!a
        );
    }
    function l(e, t) {
        return !!~("" + e).indexOf(t);
    }
    function c(e) {
        return e
            .replace(/([A-Z])/g, function (e, t) {
                return "-" + t.toLowerCase();
            })
            .replace(/^ms-/, "-ms-");
    }
    function d(t, n, i) {
        var o;
        if ("getComputedStyle" in e) {
            o = getComputedStyle.call(e, t, n);
            var s = e.console;
            if (null !== o) i && (o = o.getPropertyValue(i));
            else if (s) {
                s[s.error ? "error" : "log"].call(s, "getComputedStyle returning null, its possible modernizr test results are inaccurate");
            }
        } else o = !n && t.currentStyle && t.currentStyle[i];
        return o;
    }
    function u(t, i) {
        var o = t.length;
        if ("CSS" in e && "supports" in e.CSS) {
            for (; o--; ) if (e.CSS.supports(c(t[o]), i)) return !0;
            return !1;
        }
        if ("CSSSupportsRule" in e) {
            for (var s = []; o--; ) s.push("(" + c(t[o]) + ":" + i + ")");
            return a("@supports (" + (s = s.join(" or ")) + ") { #modernizr { position: absolute; } }", function (e) {
                return "absolute" == d(e, null, "position");
            });
        }
        return n;
    }
    function h(e) {
        return e
            .replace(/([a-z])-([a-z])/g, function (e, t, n) {
                return t + n.toUpperCase();
            })
            .replace(/^-/, "");
    }
    function p(e, t, o, s) {
        function a() {
            d && (delete D.style, delete D.modElem);
        }
        if (((s = !i(s, "undefined") && s), !i(o, "undefined"))) {
            var c = u(e, o);
            if (!i(c, "undefined")) return c;
        }
        for (var d, p, f, m, g, v = ["modernizr", "tspan", "samp"]; !D.style && v.length; ) (d = !0), (D.modElem = r(v.shift())), (D.style = D.modElem.style);
        for (f = e.length, p = 0; f > p; p++)
            if (((m = e[p]), (g = D.style[m]), l(m, "-") && (m = h(m)), D.style[m] !== n)) {
                if (s || i(o, "undefined")) return a(), "pfx" != t || m;
                try {
                    D.style[m] = o;
                } catch (e) {}
                if (D.style[m] != g) return a(), "pfx" != t || m;
            }
        return a(), !1;
    }
    function f(e, t) {
        return function () {
            return e.apply(t, arguments);
        };
    }
    function m(e, t, n, o, s) {
        var r = e.charAt(0).toUpperCase() + e.slice(1),
            a = (e + " " + L.join(r + " ") + r).split(" ");
        return i(t, "string") || i(t, "undefined")
            ? p(a, t, o, s)
            : (function (e, t, n) {
                var o;
                for (var s in e) if (e[s] in t) return !1 === n ? e[s] : i((o = t[e[s]]), "function") ? f(o, n || t) : o;
                return !1;
            })((a = (e + " " + T.join(r + " ") + r).split(" ")), t, n);
    }
    function g(e, t, i) {
        return m(e, n, n, t, i);
    }
    var v = [],
        y = {
            _version: "3.6.0",
            _config: { classPrefix: "", enableClasses: !0, enableJSClass: !0, usePrefixes: !0 },
            _q: [],
            on: function (e, t) {
                var n = this;
                setTimeout(function () {
                    t(n[e]);
                }, 0);
            },
            addTest: function (e, t, n) {
                v.push({ name: e, fn: t, options: n });
            },
            addAsyncTest: function (e) {
                v.push({ name: null, fn: e });
            },
        },
        b = function () {};
    (b.prototype = y), (b = new b());
    var w = [],
        _ = t.documentElement,
        S = "svg" === _.nodeName.toLowerCase(),
        x = "Moz O ms Webkit",
        T = y._config.usePrefixes ? x.toLowerCase().split(" ") : [];
    y._domPrefixes = T;
    var k,
        E = y._config.usePrefixes ? " -webkit- -moz- -o- -ms- ".split(" ") : ["", ""];
    (y._prefixes = E),
        (function () {
            var e = {}.hasOwnProperty;
            k =
                i(e, "undefined") || i(e.call, "undefined")
                    ? function (e, t) {
                        return t in e && i(e.constructor.prototype[t], "undefined");
                    }
                    : function (t, n) {
                        return e.call(t, n);
                    };
        })(),
        (y._l = {}),
        (y.on = function (e, t) {
            this._l[e] || (this._l[e] = []),
                this._l[e].push(t),
            b.hasOwnProperty(e) &&
            setTimeout(function () {
                b._trigger(e, b[e]);
            }, 0);
        }),
        (y._trigger = function (e, t) {
            if (this._l[e]) {
                var n = this._l[e];
                setTimeout(function () {
                    var e;
                    for (e = 0; e < n.length; e++) (0, n[e])(t);
                }, 0),
                    delete this._l[e];
            }
        }),
        b._q.push(function () {
            y.addTest = s;
        });
    var C = (function () {
        var e = !("onblur" in t.documentElement);
        return function (t, i) {
            var o;
            return (
                !!t &&
                ((i && "string" != typeof i) || (i = r(i || "div")),
                !(o = (t = "on" + t) in i) && e && (i.setAttribute || (i = r("div")), i.setAttribute(t, ""), (o = "function" == typeof i[t]), i[t] !== n && (i[t] = n), i.removeAttribute(t)),
                    o)
            );
        };
    })();
    y.hasEvent = C;
    var A = (function () {
        var t = e.matchMedia || e.msMatchMedia;
        return t
            ? function (e) {
                var n = t(e);
                return (n && n.matches) || !1;
            }
            : function (t) {
                var n = !1;
                return (
                    a("@media " + t + " { #modernizr { position: absolute; } }", function (t) {
                        n = "absolute" == (e.getComputedStyle ? e.getComputedStyle(t, null) : t.currentStyle).position;
                    }),
                        n
                );
            };
    })();
    y.mq = A;
    y.prefixedCSSValue = function (e, t) {
        var n = !1,
            i = r("div").style;
        if (e in i) {
            var o = T.length;
            for (i[e] = t, n = i[e]; o-- && !n; ) (i[e] = "-" + T[o] + "-" + t), (n = i[e]);
        }
        return "" === n && (n = !1), n;
    };
    var L = y._config.usePrefixes ? x.split(" ") : [];
    y._cssomPrefixes = L;
    var I = { elem: r("modernizr") };
    b._q.push(function () {
        delete I.elem;
    });
    var D = { style: I.elem.style };
    b._q.unshift(function () {
        delete D.style;
    }),
        (y.testAllProps = m),
        (y.testAllProps = g),
        (y.testProp = function (e, t, i) {
            return p([e], n, t, i);
        }),
        (y.testStyles = a),
        b.addTest("customelements", "customElements" in e),
        b.addTest("history", function () {
            var t = navigator.userAgent;
            return (
                ((-1 === t.indexOf("Android 2.") && -1 === t.indexOf("Android 4.0")) || -1 === t.indexOf("Mobile Safari") || -1 !== t.indexOf("Chrome") || -1 !== t.indexOf("Windows Phone") || "file:" === location.protocol) &&
                e.history &&
                "pushState" in e.history
            );
        }),
        b.addTest("pointerevents", function () {
            var e = !1,
                t = T.length;
            for (e = b.hasEvent("pointerdown"); t-- && !e; ) C(T[t] + "pointerdown") && (e = !0);
            return e;
        }),
        b.addTest("postmessage", "postMessage" in e),
        b.addTest("webgl", function () {
            var t = r("canvas"),
                n = "probablySupportsContext" in t ? "probablySupportsContext" : "supportsContext";
            return n in t ? t[n]("webgl") || t[n]("experimental-webgl") : "WebGLRenderingContext" in e;
        });
    var P = !1;
    try {
        P = "WebSocket" in e && 2 === e.WebSocket.CLOSING;
    } catch (e) {}
    b.addTest("websockets", P),
        b.addTest("cssanimations", g("animationName", "a", !0)),
        (function () {
            b.addTest("csscolumns", function () {
                var e = !1,
                    t = g("columnCount");
                try {
                    (e = !!t) && (e = new Boolean(e));
                } catch (e) {}
                return e;
            });
            for (var e, t, n = ["Width", "Span", "Fill", "Gap", "Rule", "RuleColor", "RuleStyle", "RuleWidth", "BreakBefore", "BreakAfter", "BreakInside"], i = 0; i < n.length; i++)
                (e = n[i].toLowerCase()), (t = g("column" + n[i])), ("breakbefore" === e || "breakafter" === e || "breakinside" == e) && (t = t || g(n[i])), b.addTest("csscolumns." + e, t);
        })(),
        b.addTest("flexbox", g("flexBasis", "1px", !0)),
        b.addTest("picture", "HTMLPictureElement" in e),
        b.addAsyncTest(function () {
            var e,
                t,
                n = r("img"),
                i = "sizes" in n;
            !i && "srcset" in n
                ? ("data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw==",
                    (e = "data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw=="),
                    (t = function () {
                        s("sizes", 2 == n.width);
                    }),
                    (n.onload = t),
                    (n.onerror = t),
                    n.setAttribute("sizes", "9px"),
                    (n.srcset = e + " 1w,data:image/gif;base64,R0lGODlhAgABAPAAAP///wAAACH5BAAAAAAALAAAAAACAAEAAAICBAoAOw== 8w"),
                    (n.src = e))
                : s("sizes", i);
        }),
        b.addTest("srcset", "srcset" in r("img")),
        b.addTest("webworkers", "Worker" in e),
        (function () {
            var e, t, n, o, s, r;
            for (var a in v)
                if (v.hasOwnProperty(a)) {
                    if (((e = []), (t = v[a]).name && (e.push(t.name.toLowerCase()), t.options && t.options.aliases && t.options.aliases.length))) for (n = 0; n < t.options.aliases.length; n++) e.push(t.options.aliases[n].toLowerCase());
                    for (o = i(t.fn, "function") ? t.fn() : t.fn, s = 0; s < e.length; s++)
                        1 === (r = e[s].split(".")).length ? (b[r[0]] = o) : (!b[r[0]] || b[r[0]] instanceof Boolean || (b[r[0]] = new Boolean(b[r[0]])), (b[r[0]][r[1]] = o)), w.push((o ? "" : "no-") + r.join("-"));
                }
        })(),
        o(w),
        delete y.addTest,
        delete y.addAsyncTest;
    for (var O = 0; O < b._q.length; O++) b._q[O]();
    e.Modernizr = b;
})(window, document),
    (function (e, t) {
        "use strict";
        "object" == typeof module && "object" == typeof module.exports
            ? (module.exports = e.document
                ? t(e, !0)
                : function (e) {
                    if (!e.document) throw new Error("jQuery requires a window with a document");
                    return t(e);
                })
            : t(e);
    })("undefined" != typeof window ? window : this, function (e, t) {
        "use strict";
        var n = [],
            i = e.document,
            o = Object.getPrototypeOf,
            s = n.slice,
            r = n.concat,
            a = n.push,
            l = n.indexOf,
            c = {},
            d = c.toString,
            u = c.hasOwnProperty,
            h = u.toString,
            p = h.call(Object),
            f = {},
            m = function (e) {
                return "function" == typeof e && "number" != typeof e.nodeType;
            },
            g = function (e) {
                return null != e && e === e.window;
            },
            v = { type: !0, src: !0, noModule: !0 };
        function y(e, t, n) {
            var o,
                s = (t = t || i).createElement("script");
            if (((s.text = e), n)) for (o in v) n[o] && (s[o] = n[o]);
            t.head.appendChild(s).parentNode.removeChild(s);
        }
        function b(e) {
            return null == e ? e + "" : "object" == typeof e || "function" == typeof e ? c[d.call(e)] || "object" : typeof e;
        }
        var w = function (e, t) {
                return new w.fn.init(e, t);
            },
            _ = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
        function S(e) {
            var t = !!e && "length" in e && e.length,
                n = b(e);
            return !m(e) && !g(e) && ("array" === n || 0 === t || ("number" == typeof t && t > 0 && t - 1 in e));
        }
        (w.fn = w.prototype = {
            jquery: "3.3.1",
            constructor: w,
            length: 0,
            toArray: function () {
                return s.call(this);
            },
            get: function (e) {
                return null == e ? s.call(this) : e < 0 ? this[e + this.length] : this[e];
            },
            pushStack: function (e) {
                var t = w.merge(this.constructor(), e);
                return (t.prevObject = this), t;
            },
            each: function (e) {
                return w.each(this, e);
            },
            map: function (e) {
                return this.pushStack(
                    w.map(this, function (t, n) {
                        return e.call(t, n, t);
                    })
                );
            },
            slice: function () {
                return this.pushStack(s.apply(this, arguments));
            },
            first: function () {
                return this.eq(0);
            },
            last: function () {
                return this.eq(-1);
            },
            eq: function (e) {
                var t = this.length,
                    n = +e + (e < 0 ? t : 0);
                return this.pushStack(n >= 0 && n < t ? [this[n]] : []);
            },
            end: function () {
                return this.prevObject || this.constructor();
            },
            push: a,
            sort: n.sort,
            splice: n.splice,
        }),
            (w.extend = w.fn.extend = function () {
                var e,
                    t,
                    n,
                    i,
                    o,
                    s,
                    r = arguments[0] || {},
                    a = 1,
                    l = arguments.length,
                    c = !1;
                for ("boolean" == typeof r && ((c = r), (r = arguments[a] || {}), a++), "object" == typeof r || m(r) || (r = {}), a === l && ((r = this), a--); a < l; a++)
                    if (null != (e = arguments[a]))
                        for (t in e)
                            (n = r[t]),
                            r !== (i = e[t]) &&
                            (c && i && (w.isPlainObject(i) || (o = Array.isArray(i)))
                                ? (o ? ((o = !1), (s = n && Array.isArray(n) ? n : [])) : (s = n && w.isPlainObject(n) ? n : {}), (r[t] = w.extend(c, s, i)))
                                : void 0 !== i && (r[t] = i));
                return r;
            }),
            w.extend({
                expando: "jQuery" + ("3.3.1" + Math.random()).replace(/\D/g, ""),
                isReady: !0,
                error: function (e) {
                    throw new Error(e);
                },
                noop: function () {},
                isPlainObject: function (e) {
                    var t, n;
                    return !(!e || "[object Object]" !== d.call(e) || ((t = o(e)) && ("function" != typeof (n = u.call(t, "constructor") && t.constructor) || h.call(n) !== p)));
                },
                isEmptyObject: function (e) {
                    var t;
                    for (t in e) return !1;
                    return !0;
                },
                globalEval: function (e) {
                    y(e);
                },
                each: function (e, t) {
                    var n,
                        i = 0;
                    if (S(e)) for (n = e.length; i < n && !1 !== t.call(e[i], i, e[i]); i++);
                    else for (i in e) if (!1 === t.call(e[i], i, e[i])) break;
                    return e;
                },
                trim: function (e) {
                    return null == e ? "" : (e + "").replace(_, "");
                },
                makeArray: function (e, t) {
                    var n = t || [];
                    return null != e && (S(Object(e)) ? w.merge(n, "string" == typeof e ? [e] : e) : a.call(n, e)), n;
                },
                inArray: function (e, t, n) {
                    return null == t ? -1 : l.call(t, e, n);
                },
                merge: function (e, t) {
                    for (var n = +t.length, i = 0, o = e.length; i < n; i++) e[o++] = t[i];
                    return (e.length = o), e;
                },
                grep: function (e, t, n) {
                    for (var i = [], o = 0, s = e.length, r = !n; o < s; o++) !t(e[o], o) !== r && i.push(e[o]);
                    return i;
                },
                map: function (e, t, n) {
                    var i,
                        o,
                        s = 0,
                        a = [];
                    if (S(e)) for (i = e.length; s < i; s++) null != (o = t(e[s], s, n)) && a.push(o);
                    else for (s in e) null != (o = t(e[s], s, n)) && a.push(o);
                    return r.apply([], a);
                },
                guid: 1,
                support: f,
            }),
        "function" == typeof Symbol && (w.fn[Symbol.iterator] = n[Symbol.iterator]),
            w.each("Boolean Number String Function Array Date RegExp Object Error Symbol".split(" "), function (e, t) {
                c["[object " + t + "]"] = t.toLowerCase();
            });
        var x = (function (e) {
            var t,
                n,
                i,
                o,
                s,
                r,
                a,
                l,
                c,
                d,
                u,
                h,
                p,
                f,
                m,
                g,
                v,
                y,
                b,
                w = "sizzle" + 1 * new Date(),
                _ = e.document,
                S = 0,
                x = 0,
                T = re(),
                k = re(),
                E = re(),
                C = function (e, t) {
                    return e === t && (u = !0), 0;
                },
                A = {}.hasOwnProperty,
                L = [],
                I = L.pop,
                D = L.push,
                P = L.push,
                O = L.slice,
                N = function (e, t) {
                    for (var n = 0, i = e.length; n < i; n++) if (e[n] === t) return n;
                    return -1;
                },
                j = "checked|selected|async|autofocus|autoplay|controls|defer|disabled|hidden|ismap|loop|multiple|open|readonly|required|scoped",
                H = "[\\x20\\t\\r\\n\\f]",
                M = "(?:\\\\.|[\\w-]|[^\0-\\xa0])+",
                $ = "\\[" + H + "*(" + M + ")(?:" + H + "*([*^$|!~]?=)" + H + "*(?:'((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\"|(" + M + "))|)" + H + "*\\]",
                z = ":(" + M + ")(?:\\((('((?:\\\\.|[^\\\\'])*)'|\"((?:\\\\.|[^\\\\\"])*)\")|((?:\\\\.|[^\\\\()[\\]]|" + $ + ")*)|.*)\\)|)",
                q = new RegExp(H + "+", "g"),
                W = new RegExp("^" + H + "+|((?:^|[^\\\\])(?:\\\\.)*)" + H + "+$", "g"),
                R = new RegExp("^" + H + "*," + H + "*"),
                B = new RegExp("^" + H + "*([>+~]|" + H + ")" + H + "*"),
                F = new RegExp("=" + H + "*([^\\]'\"]*?)" + H + "*\\]", "g"),
                U = new RegExp(z),
                Q = new RegExp("^" + M + "$"),
                Y = {
                    ID: new RegExp("^#(" + M + ")"),
                    CLASS: new RegExp("^\\.(" + M + ")"),
                    TAG: new RegExp("^(" + M + "|[*])"),
                    ATTR: new RegExp("^" + $),
                    PSEUDO: new RegExp("^" + z),
                    CHILD: new RegExp("^:(only|first|last|nth|nth-last)-(child|of-type)(?:\\(" + H + "*(even|odd|(([+-]|)(\\d*)n|)" + H + "*(?:([+-]|)" + H + "*(\\d+)|))" + H + "*\\)|)", "i"),
                    bool: new RegExp("^(?:" + j + ")$", "i"),
                    needsContext: new RegExp("^" + H + "*[>+~]|:(even|odd|eq|gt|lt|nth|first|last)(?:\\(" + H + "*((?:-\\d)?\\d*)" + H + "*\\)|)(?=[^-]|$)", "i"),
                },
                V = /^(?:input|select|textarea|button)$/i,
                X = /^h\d$/i,
                K = /^[^{]+\{\s*\[native \w/,
                G = /^(?:#([\w-]+)|(\w+)|\.([\w-]+))$/,
                J = /[+~]/,
                Z = new RegExp("\\\\([\\da-f]{1,6}" + H + "?|(" + H + ")|.)", "ig"),
                ee = function (e, t, n) {
                    var i = "0x" + t - 65536;
                    return i != i || n ? t : i < 0 ? String.fromCharCode(i + 65536) : String.fromCharCode((i >> 10) | 55296, (1023 & i) | 56320);
                },
                te = /([\0-\x1f\x7f]|^-?\d)|^-$|[^\0-\x1f\x7f-\uFFFF\w-]/g,
                ne = function (e, t) {
                    return t ? ("\0" === e ? "�" : e.slice(0, -1) + "\\" + e.charCodeAt(e.length - 1).toString(16) + " ") : "\\" + e;
                },
                ie = function () {
                    h();
                },
                oe = ye(
                    function (e) {
                        return !0 === e.disabled && ("form" in e || "label" in e);
                    },
                    { dir: "parentNode", next: "legend" }
                );
            try {
                P.apply((L = O.call(_.childNodes)), _.childNodes), L[_.childNodes.length].nodeType;
            } catch (e) {
                P = {
                    apply: L.length
                        ? function (e, t) {
                            D.apply(e, O.call(t));
                        }
                        : function (e, t) {
                            for (var n = e.length, i = 0; (e[n++] = t[i++]); );
                            e.length = n - 1;
                        },
                };
            }
            function se(e, t, i, o) {
                var s,
                    a,
                    c,
                    d,
                    u,
                    f,
                    v,
                    y = t && t.ownerDocument,
                    S = t ? t.nodeType : 9;
                if (((i = i || []), "string" != typeof e || !e || (1 !== S && 9 !== S && 11 !== S))) return i;
                if (!o && ((t ? t.ownerDocument || t : _) !== p && h(t), (t = t || p), m)) {
                    if (11 !== S && (u = G.exec(e)))
                        if ((s = u[1])) {
                            if (9 === S) {
                                if (!(c = t.getElementById(s))) return i;
                                if (c.id === s) return i.push(c), i;
                            } else if (y && (c = y.getElementById(s)) && b(t, c) && c.id === s) return i.push(c), i;
                        } else {
                            if (u[2]) return P.apply(i, t.getElementsByTagName(e)), i;
                            if ((s = u[3]) && n.getElementsByClassName && t.getElementsByClassName) return P.apply(i, t.getElementsByClassName(s)), i;
                        }
                    if (n.qsa && !E[e + " "] && (!g || !g.test(e))) {
                        if (1 !== S) (y = t), (v = e);
                        else if ("object" !== t.nodeName.toLowerCase()) {
                            for ((d = t.getAttribute("id")) ? (d = d.replace(te, ne)) : t.setAttribute("id", (d = w)), a = (f = r(e)).length; a--; ) f[a] = "#" + d + " " + ve(f[a]);
                            (v = f.join(",")), (y = (J.test(e) && me(t.parentNode)) || t);
                        }
                        if (v)
                            try {
                                return P.apply(i, y.querySelectorAll(v)), i;
                            } catch (e) {
                            } finally {
                                d === w && t.removeAttribute("id");
                            }
                    }
                }
                return l(e.replace(W, "$1"), t, i, o);
            }
            function re() {
                var e = [];
                return function t(n, o) {
                    return e.push(n + " ") > i.cacheLength && delete t[e.shift()], (t[n + " "] = o);
                };
            }
            function ae(e) {
                return (e[w] = !0), e;
            }
            function le(e) {
                var t = p.createElement("fieldset");
                try {
                    return !!e(t);
                } catch (e) {
                    return !1;
                } finally {
                    t.parentNode && t.parentNode.removeChild(t), (t = null);
                }
            }
            function ce(e, t) {
                for (var n = e.split("|"), o = n.length; o--; ) i.attrHandle[n[o]] = t;
            }
            function de(e, t) {
                var n = t && e,
                    i = n && 1 === e.nodeType && 1 === t.nodeType && e.sourceIndex - t.sourceIndex;
                if (i) return i;
                if (n) for (; (n = n.nextSibling); ) if (n === t) return -1;
                return e ? 1 : -1;
            }
            function ue(e) {
                return function (t) {
                    return "input" === t.nodeName.toLowerCase() && t.type === e;
                };
            }
            function he(e) {
                return function (t) {
                    var n = t.nodeName.toLowerCase();
                    return ("input" === n || "button" === n) && t.type === e;
                };
            }
            function pe(e) {
                return function (t) {
                    return "form" in t
                        ? t.parentNode && !1 === t.disabled
                            ? "label" in t
                                ? "label" in t.parentNode
                                    ? t.parentNode.disabled === e
                                    : t.disabled === e
                                : t.isDisabled === e || (t.isDisabled !== !e && oe(t) === e)
                            : t.disabled === e
                        : "label" in t && t.disabled === e;
                };
            }
            function fe(e) {
                return ae(function (t) {
                    return (
                        (t = +t),
                            ae(function (n, i) {
                                for (var o, s = e([], n.length, t), r = s.length; r--; ) n[(o = s[r])] && (n[o] = !(i[o] = n[o]));
                            })
                    );
                });
            }
            function me(e) {
                return e && void 0 !== e.getElementsByTagName && e;
            }
            for (t in ((n = se.support = {}),
                (s = se.isXML = function (e) {
                    var t = e && (e.ownerDocument || e).documentElement;
                    return !!t && "HTML" !== t.nodeName;
                }),
                (h = se.setDocument = function (e) {
                    var t,
                        o,
                        r = e ? e.ownerDocument || e : _;
                    return r !== p && 9 === r.nodeType && r.documentElement
                        ? ((f = (p = r).documentElement),
                            (m = !s(p)),
                        _ !== p && (o = p.defaultView) && o.top !== o && (o.addEventListener ? o.addEventListener("unload", ie, !1) : o.attachEvent && o.attachEvent("onunload", ie)),
                            (n.attributes = le(function (e) {
                                return (e.className = "i"), !e.getAttribute("className");
                            })),
                            (n.getElementsByTagName = le(function (e) {
                                return e.appendChild(p.createComment("")), !e.getElementsByTagName("*").length;
                            })),
                            (n.getElementsByClassName = K.test(p.getElementsByClassName)),
                            (n.getById = le(function (e) {
                                return (f.appendChild(e).id = w), !p.getElementsByName || !p.getElementsByName(w).length;
                            })),
                            n.getById
                                ? ((i.filter.ID = function (e) {
                                    var t = e.replace(Z, ee);
                                    return function (e) {
                                        return e.getAttribute("id") === t;
                                    };
                                }),
                                    (i.find.ID = function (e, t) {
                                        if (void 0 !== t.getElementById && m) {
                                            var n = t.getElementById(e);
                                            return n ? [n] : [];
                                        }
                                    }))
                                : ((i.filter.ID = function (e) {
                                    var t = e.replace(Z, ee);
                                    return function (e) {
                                        var n = void 0 !== e.getAttributeNode && e.getAttributeNode("id");
                                        return n && n.value === t;
                                    };
                                }),
                                    (i.find.ID = function (e, t) {
                                        if (void 0 !== t.getElementById && m) {
                                            var n,
                                                i,
                                                o,
                                                s = t.getElementById(e);
                                            if (s) {
                                                if ((n = s.getAttributeNode("id")) && n.value === e) return [s];
                                                for (o = t.getElementsByName(e), i = 0; (s = o[i++]); ) if ((n = s.getAttributeNode("id")) && n.value === e) return [s];
                                            }
                                            return [];
                                        }
                                    })),
                            (i.find.TAG = n.getElementsByTagName
                                ? function (e, t) {
                                    return void 0 !== t.getElementsByTagName ? t.getElementsByTagName(e) : n.qsa ? t.querySelectorAll(e) : void 0;
                                }
                                : function (e, t) {
                                    var n,
                                        i = [],
                                        o = 0,
                                        s = t.getElementsByTagName(e);
                                    if ("*" === e) {
                                        for (; (n = s[o++]); ) 1 === n.nodeType && i.push(n);
                                        return i;
                                    }
                                    return s;
                                }),
                            (i.find.CLASS =
                                n.getElementsByClassName &&
                                function (e, t) {
                                    if (void 0 !== t.getElementsByClassName && m) return t.getElementsByClassName(e);
                                }),
                            (v = []),
                            (g = []),
                        (n.qsa = K.test(p.querySelectorAll)) &&
                        (le(function (e) {
                            (f.appendChild(e).innerHTML = "<a id='" + w + "'></a><select id='" + w + "-\r\\' msallowcapture=''><option selected=''></option></select>"),
                            e.querySelectorAll("[msallowcapture^='']").length && g.push("[*^$]=" + H + "*(?:''|\"\")"),
                            e.querySelectorAll("[selected]").length || g.push("\\[" + H + "*(?:value|" + j + ")"),
                            e.querySelectorAll("[id~=" + w + "-]").length || g.push("~="),
                            e.querySelectorAll(":checked").length || g.push(":checked"),
                            e.querySelectorAll("a#" + w + "+*").length || g.push(".#.+[+~]");
                        }),
                            le(function (e) {
                                e.innerHTML = "<a href='' disabled='disabled'></a><select disabled='disabled'><option/></select>";
                                var t = p.createElement("input");
                                t.setAttribute("type", "hidden"),
                                    e.appendChild(t).setAttribute("name", "D"),
                                e.querySelectorAll("[name=d]").length && g.push("name" + H + "*[*^$|!~]?="),
                                2 !== e.querySelectorAll(":enabled").length && g.push(":enabled", ":disabled"),
                                    (f.appendChild(e).disabled = !0),
                                2 !== e.querySelectorAll(":disabled").length && g.push(":enabled", ":disabled"),
                                    e.querySelectorAll("*,:x"),
                                    g.push(",.*:");
                            })),
                        (n.matchesSelector = K.test((y = f.matches || f.webkitMatchesSelector || f.mozMatchesSelector || f.oMatchesSelector || f.msMatchesSelector))) &&
                        le(function (e) {
                            (n.disconnectedMatch = y.call(e, "*")), y.call(e, "[s!='']:x"), v.push("!=", z);
                        }),
                            (g = g.length && new RegExp(g.join("|"))),
                            (v = v.length && new RegExp(v.join("|"))),
                            (t = K.test(f.compareDocumentPosition)),
                            (b =
                                t || K.test(f.contains)
                                    ? function (e, t) {
                                        var n = 9 === e.nodeType ? e.documentElement : e,
                                            i = t && t.parentNode;
                                        return e === i || !(!i || 1 !== i.nodeType || !(n.contains ? n.contains(i) : e.compareDocumentPosition && 16 & e.compareDocumentPosition(i)));
                                    }
                                    : function (e, t) {
                                        if (t) for (; (t = t.parentNode); ) if (t === e) return !0;
                                        return !1;
                                    }),
                            (C = t
                                ? function (e, t) {
                                    if (e === t) return (u = !0), 0;
                                    var i = !e.compareDocumentPosition - !t.compareDocumentPosition;
                                    return (
                                        i ||
                                        (1 & (i = (e.ownerDocument || e) === (t.ownerDocument || t) ? e.compareDocumentPosition(t) : 1) || (!n.sortDetached && t.compareDocumentPosition(e) === i)
                                            ? e === p || (e.ownerDocument === _ && b(_, e))
                                                ? -1
                                                : t === p || (t.ownerDocument === _ && b(_, t))
                                                    ? 1
                                                    : d
                                                        ? N(d, e) - N(d, t)
                                                        : 0
                                            : 4 & i
                                                ? -1
                                                : 1)
                                    );
                                }
                                : function (e, t) {
                                    if (e === t) return (u = !0), 0;
                                    var n,
                                        i = 0,
                                        o = e.parentNode,
                                        s = t.parentNode,
                                        r = [e],
                                        a = [t];
                                    if (!o || !s) return e === p ? -1 : t === p ? 1 : o ? -1 : s ? 1 : d ? N(d, e) - N(d, t) : 0;
                                    if (o === s) return de(e, t);
                                    for (n = e; (n = n.parentNode); ) r.unshift(n);
                                    for (n = t; (n = n.parentNode); ) a.unshift(n);
                                    for (; r[i] === a[i]; ) i++;
                                    return i ? de(r[i], a[i]) : r[i] === _ ? -1 : a[i] === _ ? 1 : 0;
                                }),
                            p)
                        : p;
                }),
                (se.matches = function (e, t) {
                    return se(e, null, null, t);
                }),
                (se.matchesSelector = function (e, t) {
                    if (((e.ownerDocument || e) !== p && h(e), (t = t.replace(F, "='$1']")), n.matchesSelector && m && !E[t + " "] && (!v || !v.test(t)) && (!g || !g.test(t))))
                        try {
                            var i = y.call(e, t);
                            if (i || n.disconnectedMatch || (e.document && 11 !== e.document.nodeType)) return i;
                        } catch (e) {}
                    return se(t, p, null, [e]).length > 0;
                }),
                (se.contains = function (e, t) {
                    return (e.ownerDocument || e) !== p && h(e), b(e, t);
                }),
                (se.attr = function (e, t) {
                    (e.ownerDocument || e) !== p && h(e);
                    var o = i.attrHandle[t.toLowerCase()],
                        s = o && A.call(i.attrHandle, t.toLowerCase()) ? o(e, t, !m) : void 0;
                    return void 0 !== s ? s : n.attributes || !m ? e.getAttribute(t) : (s = e.getAttributeNode(t)) && s.specified ? s.value : null;
                }),
                (se.escape = function (e) {
                    return (e + "").replace(te, ne);
                }),
                (se.error = function (e) {
                    throw new Error("Syntax error, unrecognized expression: " + e);
                }),
                (se.uniqueSort = function (e) {
                    var t,
                        i = [],
                        o = 0,
                        s = 0;
                    if (((u = !n.detectDuplicates), (d = !n.sortStable && e.slice(0)), e.sort(C), u)) {
                        for (; (t = e[s++]); ) t === e[s] && (o = i.push(s));
                        for (; o--; ) e.splice(i[o], 1);
                    }
                    return (d = null), e;
                }),
                (o = se.getText = function (e) {
                    var t,
                        n = "",
                        i = 0,
                        s = e.nodeType;
                    if (s) {
                        if (1 === s || 9 === s || 11 === s) {
                            if ("string" == typeof e.textContent) return e.textContent;
                            for (e = e.firstChild; e; e = e.nextSibling) n += o(e);
                        } else if (3 === s || 4 === s) return e.nodeValue;
                    } else for (; (t = e[i++]); ) n += o(t);
                    return n;
                }),
                ((i = se.selectors = {
                    cacheLength: 50,
                    createPseudo: ae,
                    match: Y,
                    attrHandle: {},
                    find: {},
                    relative: { ">": { dir: "parentNode", first: !0 }, " ": { dir: "parentNode" }, "+": { dir: "previousSibling", first: !0 }, "~": { dir: "previousSibling" } },
                    preFilter: {
                        ATTR: function (e) {
                            return (e[1] = e[1].replace(Z, ee)), (e[3] = (e[3] || e[4] || e[5] || "").replace(Z, ee)), "~=" === e[2] && (e[3] = " " + e[3] + " "), e.slice(0, 4);
                        },
                        CHILD: function (e) {
                            return (
                                (e[1] = e[1].toLowerCase()),
                                    "nth" === e[1].slice(0, 3) ? (e[3] || se.error(e[0]), (e[4] = +(e[4] ? e[5] + (e[6] || 1) : 2 * ("even" === e[3] || "odd" === e[3]))), (e[5] = +(e[7] + e[8] || "odd" === e[3]))) : e[3] && se.error(e[0]),
                                    e
                            );
                        },
                        PSEUDO: function (e) {
                            var t,
                                n = !e[6] && e[2];
                            return Y.CHILD.test(e[0])
                                ? null
                                : (e[3] ? (e[2] = e[4] || e[5] || "") : n && U.test(n) && (t = r(n, !0)) && (t = n.indexOf(")", n.length - t) - n.length) && ((e[0] = e[0].slice(0, t)), (e[2] = n.slice(0, t))), e.slice(0, 3));
                        },
                    },
                    filter: {
                        TAG: function (e) {
                            var t = e.replace(Z, ee).toLowerCase();
                            return "*" === e
                                ? function () {
                                    return !0;
                                }
                                : function (e) {
                                    return e.nodeName && e.nodeName.toLowerCase() === t;
                                };
                        },
                        CLASS: function (e) {
                            var t = T[e + " "];
                            return (
                                t ||
                                ((t = new RegExp("(^|" + H + ")" + e + "(" + H + "|$)")) &&
                                    T(e, function (e) {
                                        return t.test(("string" == typeof e.className && e.className) || (void 0 !== e.getAttribute && e.getAttribute("class")) || "");
                                    }))
                            );
                        },
                        ATTR: function (e, t, n) {
                            return function (i) {
                                var o = se.attr(i, e);
                                return null == o
                                    ? "!=" === t
                                    : !t ||
                                    ((o += ""),
                                        "=" === t
                                            ? o === n
                                            : "!=" === t
                                                ? o !== n
                                                : "^=" === t
                                                    ? n && 0 === o.indexOf(n)
                                                    : "*=" === t
                                                        ? n && o.indexOf(n) > -1
                                                        : "$=" === t
                                                            ? n && o.slice(-n.length) === n
                                                            : "~=" === t
                                                                ? (" " + o.replace(q, " ") + " ").indexOf(n) > -1
                                                                : "|=" === t && (o === n || o.slice(0, n.length + 1) === n + "-"));
                            };
                        },
                        CHILD: function (e, t, n, i, o) {
                            var s = "nth" !== e.slice(0, 3),
                                r = "last" !== e.slice(-4),
                                a = "of-type" === t;
                            return 1 === i && 0 === o
                                ? function (e) {
                                    return !!e.parentNode;
                                }
                                : function (t, n, l) {
                                    var c,
                                        d,
                                        u,
                                        h,
                                        p,
                                        f,
                                        m = s !== r ? "nextSibling" : "previousSibling",
                                        g = t.parentNode,
                                        v = a && t.nodeName.toLowerCase(),
                                        y = !l && !a,
                                        b = !1;
                                    if (g) {
                                        if (s) {
                                            for (; m; ) {
                                                for (h = t; (h = h[m]); ) if (a ? h.nodeName.toLowerCase() === v : 1 === h.nodeType) return !1;
                                                f = m = "only" === e && !f && "nextSibling";
                                            }
                                            return !0;
                                        }
                                        if (((f = [r ? g.firstChild : g.lastChild]), r && y)) {
                                            for (
                                                b = (p = (c = (d = (u = (h = g)[w] || (h[w] = {}))[h.uniqueID] || (u[h.uniqueID] = {}))[e] || [])[0] === S && c[1]) && c[2], h = p && g.childNodes[p];
                                                (h = (++p && h && h[m]) || (b = p = 0) || f.pop());

                                            )
                                                if (1 === h.nodeType && ++b && h === t) {
                                                    d[e] = [S, p, b];
                                                    break;
                                                }
                                        } else if ((y && (b = p = (c = (d = (u = (h = t)[w] || (h[w] = {}))[h.uniqueID] || (u[h.uniqueID] = {}))[e] || [])[0] === S && c[1]), !1 === b))
                                            for (
                                                ;
                                                (h = (++p && h && h[m]) || (b = p = 0) || f.pop()) &&
                                                ((a ? h.nodeName.toLowerCase() !== v : 1 !== h.nodeType) || !++b || (y && ((d = (u = h[w] || (h[w] = {}))[h.uniqueID] || (u[h.uniqueID] = {}))[e] = [S, b]), h !== t));

                                            );
                                        return (b -= o) === i || (b % i == 0 && b / i >= 0);
                                    }
                                };
                        },
                        PSEUDO: function (e, t) {
                            var n,
                                o = i.pseudos[e] || i.setFilters[e.toLowerCase()] || se.error("unsupported pseudo: " + e);
                            return o[w]
                                ? o(t)
                                : o.length > 1
                                    ? ((n = [e, e, "", t]),
                                        i.setFilters.hasOwnProperty(e.toLowerCase())
                                            ? ae(function (e, n) {
                                                for (var i, s = o(e, t), r = s.length; r--; ) e[(i = N(e, s[r]))] = !(n[i] = s[r]);
                                            })
                                            : function (e) {
                                                return o(e, 0, n);
                                            })
                                    : o;
                        },
                    },
                    pseudos: {
                        not: ae(function (e) {
                            var t = [],
                                n = [],
                                i = a(e.replace(W, "$1"));
                            return i[w]
                                ? ae(function (e, t, n, o) {
                                    for (var s, r = i(e, null, o, []), a = e.length; a--; ) (s = r[a]) && (e[a] = !(t[a] = s));
                                })
                                : function (e, o, s) {
                                    return (t[0] = e), i(t, null, s, n), (t[0] = null), !n.pop();
                                };
                        }),
                        has: ae(function (e) {
                            return function (t) {
                                return se(e, t).length > 0;
                            };
                        }),
                        contains: ae(function (e) {
                            return (
                                (e = e.replace(Z, ee)),
                                    function (t) {
                                        return (t.textContent || t.innerText || o(t)).indexOf(e) > -1;
                                    }
                            );
                        }),
                        lang: ae(function (e) {
                            return (
                                Q.test(e || "") || se.error("unsupported lang: " + e),
                                    (e = e.replace(Z, ee).toLowerCase()),
                                    function (t) {
                                        var n;
                                        do {
                                            if ((n = m ? t.lang : t.getAttribute("xml:lang") || t.getAttribute("lang"))) return (n = n.toLowerCase()) === e || 0 === n.indexOf(e + "-");
                                        } while ((t = t.parentNode) && 1 === t.nodeType);
                                        return !1;
                                    }
                            );
                        }),
                        target: function (t) {
                            var n = e.location && e.location.hash;
                            return n && n.slice(1) === t.id;
                        },
                        root: function (e) {
                            return e === f;
                        },
                        focus: function (e) {
                            return e === p.activeElement && (!p.hasFocus || p.hasFocus()) && !!(e.type || e.href || ~e.tabIndex);
                        },
                        enabled: pe(!1),
                        disabled: pe(!0),
                        checked: function (e) {
                            var t = e.nodeName.toLowerCase();
                            return ("input" === t && !!e.checked) || ("option" === t && !!e.selected);
                        },
                        selected: function (e) {
                            return e.parentNode && e.parentNode.selectedIndex, !0 === e.selected;
                        },
                        empty: function (e) {
                            for (e = e.firstChild; e; e = e.nextSibling) if (e.nodeType < 6) return !1;
                            return !0;
                        },
                        parent: function (e) {
                            return !i.pseudos.empty(e);
                        },
                        header: function (e) {
                            return X.test(e.nodeName);
                        },
                        input: function (e) {
                            return V.test(e.nodeName);
                        },
                        button: function (e) {
                            var t = e.nodeName.toLowerCase();
                            return ("input" === t && "button" === e.type) || "button" === t;
                        },
                        text: function (e) {
                            var t;
                            return "input" === e.nodeName.toLowerCase() && "text" === e.type && (null == (t = e.getAttribute("type")) || "text" === t.toLowerCase());
                        },
                        first: fe(function () {
                            return [0];
                        }),
                        last: fe(function (e, t) {
                            return [t - 1];
                        }),
                        eq: fe(function (e, t, n) {
                            return [n < 0 ? n + t : n];
                        }),
                        even: fe(function (e, t) {
                            for (var n = 0; n < t; n += 2) e.push(n);
                            return e;
                        }),
                        odd: fe(function (e, t) {
                            for (var n = 1; n < t; n += 2) e.push(n);
                            return e;
                        }),
                        lt: fe(function (e, t, n) {
                            for (var i = n < 0 ? n + t : n; --i >= 0; ) e.push(i);
                            return e;
                        }),
                        gt: fe(function (e, t, n) {
                            for (var i = n < 0 ? n + t : n; ++i < t; ) e.push(i);
                            return e;
                        }),
                    },
                }).pseudos.nth = i.pseudos.eq),
                { radio: !0, checkbox: !0, file: !0, password: !0, image: !0 }))
                i.pseudos[t] = ue(t);
            for (t in { submit: !0, reset: !0 }) i.pseudos[t] = he(t);
            function ge() {}
            function ve(e) {
                for (var t = 0, n = e.length, i = ""; t < n; t++) i += e[t].value;
                return i;
            }
            function ye(e, t, n) {
                var i = t.dir,
                    o = t.next,
                    s = o || i,
                    r = n && "parentNode" === s,
                    a = x++;
                return t.first
                    ? function (t, n, o) {
                        for (; (t = t[i]); ) if (1 === t.nodeType || r) return e(t, n, o);
                        return !1;
                    }
                    : function (t, n, l) {
                        var c,
                            d,
                            u,
                            h = [S, a];
                        if (l) {
                            for (; (t = t[i]); ) if ((1 === t.nodeType || r) && e(t, n, l)) return !0;
                        } else
                            for (; (t = t[i]); )
                                if (1 === t.nodeType || r)
                                    if (((d = (u = t[w] || (t[w] = {}))[t.uniqueID] || (u[t.uniqueID] = {})), o && o === t.nodeName.toLowerCase())) t = t[i] || t;
                                    else {
                                        if ((c = d[s]) && c[0] === S && c[1] === a) return (h[2] = c[2]);
                                        if (((d[s] = h), (h[2] = e(t, n, l)))) return !0;
                                    }
                        return !1;
                    };
            }
            function be(e) {
                return e.length > 1
                    ? function (t, n, i) {
                        for (var o = e.length; o--; ) if (!e[o](t, n, i)) return !1;
                        return !0;
                    }
                    : e[0];
            }
            function we(e, t, n, i, o) {
                for (var s, r = [], a = 0, l = e.length, c = null != t; a < l; a++) (s = e[a]) && ((n && !n(s, i, o)) || (r.push(s), c && t.push(a)));
                return r;
            }
            function _e(e, t, n, i, o, s) {
                return (
                    i && !i[w] && (i = _e(i)),
                    o && !o[w] && (o = _e(o, s)),
                        ae(function (s, r, a, l) {
                            var c,
                                d,
                                u,
                                h = [],
                                p = [],
                                f = r.length,
                                m =
                                    s ||
                                    (function (e, t, n) {
                                        for (var i = 0, o = t.length; i < o; i++) se(e, t[i], n);
                                        return n;
                                    })(t || "*", a.nodeType ? [a] : a, []),
                                g = !e || (!s && t) ? m : we(m, h, e, a, l),
                                v = n ? (o || (s ? e : f || i) ? [] : r) : g;
                            if ((n && n(g, v, a, l), i)) for (c = we(v, p), i(c, [], a, l), d = c.length; d--; ) (u = c[d]) && (v[p[d]] = !(g[p[d]] = u));
                            if (s) {
                                if (o || e) {
                                    if (o) {
                                        for (c = [], d = v.length; d--; ) (u = v[d]) && c.push((g[d] = u));
                                        o(null, (v = []), c, l);
                                    }
                                    for (d = v.length; d--; ) (u = v[d]) && (c = o ? N(s, u) : h[d]) > -1 && (s[c] = !(r[c] = u));
                                }
                            } else (v = we(v === r ? v.splice(f, v.length) : v)), o ? o(null, r, v, l) : P.apply(r, v);
                        })
                );
            }
            function Se(e) {
                for (
                    var t,
                        n,
                        o,
                        s = e.length,
                        r = i.relative[e[0].type],
                        a = r || i.relative[" "],
                        l = r ? 1 : 0,
                        d = ye(
                            function (e) {
                                return e === t;
                            },
                            a,
                            !0
                        ),
                        u = ye(
                            function (e) {
                                return N(t, e) > -1;
                            },
                            a,
                            !0
                        ),
                        h = [
                            function (e, n, i) {
                                var o = (!r && (i || n !== c)) || ((t = n).nodeType ? d(e, n, i) : u(e, n, i));
                                return (t = null), o;
                            },
                        ];
                    l < s;
                    l++
                )
                    if ((n = i.relative[e[l].type])) h = [ye(be(h), n)];
                    else {
                        if ((n = i.filter[e[l].type].apply(null, e[l].matches))[w]) {
                            for (o = ++l; o < s && !i.relative[e[o].type]; o++);
                            return _e(l > 1 && be(h), l > 1 && ve(e.slice(0, l - 1).concat({ value: " " === e[l - 2].type ? "*" : "" })).replace(W, "$1"), n, l < o && Se(e.slice(l, o)), o < s && Se((e = e.slice(o))), o < s && ve(e));
                        }
                        h.push(n);
                    }
                return be(h);
            }
            function xe(e, t) {
                var n = t.length > 0,
                    o = e.length > 0,
                    s = function (s, r, a, l, d) {
                        var u,
                            f,
                            g,
                            v = 0,
                            y = "0",
                            b = s && [],
                            w = [],
                            _ = c,
                            x = s || (o && i.find.TAG("*", d)),
                            T = (S += null == _ ? 1 : Math.random() || 0.1),
                            k = x.length;
                        for (d && (c = r === p || r || d); y !== k && null != (u = x[y]); y++) {
                            if (o && u) {
                                for (f = 0, r || u.ownerDocument === p || (h(u), (a = !m)); (g = e[f++]); )
                                    if (g(u, r || p, a)) {
                                        l.push(u);
                                        break;
                                    }
                                d && (S = T);
                            }
                            n && ((u = !g && u) && v--, s && b.push(u));
                        }
                        if (((v += y), n && y !== v)) {
                            for (f = 0; (g = t[f++]); ) g(b, w, r, a);
                            if (s) {
                                if (v > 0) for (; y--; ) b[y] || w[y] || (w[y] = I.call(l));
                                w = we(w);
                            }
                            P.apply(l, w), d && !s && w.length > 0 && v + t.length > 1 && se.uniqueSort(l);
                        }
                        return d && ((S = T), (c = _)), b;
                    };
                return n ? ae(s) : s;
            }
            return (
                (ge.prototype = i.filters = i.pseudos),
                    (i.setFilters = new ge()),
                    (r = se.tokenize = function (e, t) {
                        var n,
                            o,
                            s,
                            r,
                            a,
                            l,
                            c,
                            d = k[e + " "];
                        if (d) return t ? 0 : d.slice(0);
                        for (a = e, l = [], c = i.preFilter; a; ) {
                            for (r in ((n && !(o = R.exec(a))) || (o && (a = a.slice(o[0].length) || a), l.push((s = []))),
                                (n = !1),
                            (o = B.exec(a)) && ((n = o.shift()), s.push({ value: n, type: o[0].replace(W, " ") }), (a = a.slice(n.length))),
                                i.filter))
                                !(o = Y[r].exec(a)) || (c[r] && !(o = c[r](o))) || ((n = o.shift()), s.push({ value: n, type: r, matches: o }), (a = a.slice(n.length)));
                            if (!n) break;
                        }
                        return t ? a.length : a ? se.error(e) : k(e, l).slice(0);
                    }),
                    (a = se.compile = function (e, t) {
                        var n,
                            i = [],
                            o = [],
                            s = E[e + " "];
                        if (!s) {
                            for (t || (t = r(e)), n = t.length; n--; ) (s = Se(t[n]))[w] ? i.push(s) : o.push(s);
                            (s = E(e, xe(o, i))).selector = e;
                        }
                        return s;
                    }),
                    (l = se.select = function (e, t, n, o) {
                        var s,
                            l,
                            c,
                            d,
                            u,
                            h = "function" == typeof e && e,
                            p = !o && r((e = h.selector || e));
                        if (((n = n || []), 1 === p.length)) {
                            if ((l = p[0] = p[0].slice(0)).length > 2 && "ID" === (c = l[0]).type && 9 === t.nodeType && m && i.relative[l[1].type]) {
                                if (!(t = (i.find.ID(c.matches[0].replace(Z, ee), t) || [])[0])) return n;
                                h && (t = t.parentNode), (e = e.slice(l.shift().value.length));
                            }
                            for (s = Y.needsContext.test(e) ? 0 : l.length; s-- && ((c = l[s]), !i.relative[(d = c.type)]); )
                                if ((u = i.find[d]) && (o = u(c.matches[0].replace(Z, ee), (J.test(l[0].type) && me(t.parentNode)) || t))) {
                                    if ((l.splice(s, 1), !(e = o.length && ve(l)))) return P.apply(n, o), n;
                                    break;
                                }
                        }
                        return (h || a(e, p))(o, t, !m, n, !t || (J.test(e) && me(t.parentNode)) || t), n;
                    }),
                    (n.sortStable = w.split("").sort(C).join("") === w),
                    (n.detectDuplicates = !!u),
                    h(),
                    (n.sortDetached = le(function (e) {
                        return 1 & e.compareDocumentPosition(p.createElement("fieldset"));
                    })),
                le(function (e) {
                    return (e.innerHTML = "<a href='#'></a>"), "#" === e.firstChild.getAttribute("href");
                }) ||
                ce("type|href|height|width", function (e, t, n) {
                    if (!n) return e.getAttribute(t, "type" === t.toLowerCase() ? 1 : 2);
                }),
                (n.attributes &&
                    le(function (e) {
                        return (e.innerHTML = "<input/>"), e.firstChild.setAttribute("value", ""), "" === e.firstChild.getAttribute("value");
                    })) ||
                ce("value", function (e, t, n) {
                    if (!n && "input" === e.nodeName.toLowerCase()) return e.defaultValue;
                }),
                le(function (e) {
                    return null == e.getAttribute("disabled");
                }) ||
                ce(j, function (e, t, n) {
                    var i;
                    if (!n) return !0 === e[t] ? t.toLowerCase() : (i = e.getAttributeNode(t)) && i.specified ? i.value : null;
                }),
                    se
            );
        })(e);
        (w.find = x), (w.expr = x.selectors), (w.expr[":"] = w.expr.pseudos), (w.uniqueSort = w.unique = x.uniqueSort), (w.text = x.getText), (w.isXMLDoc = x.isXML), (w.contains = x.contains), (w.escapeSelector = x.escape);
        var T = function (e, t, n) {
                for (var i = [], o = void 0 !== n; (e = e[t]) && 9 !== e.nodeType; )
                    if (1 === e.nodeType) {
                        if (o && w(e).is(n)) break;
                        i.push(e);
                    }
                return i;
            },
            k = function (e, t) {
                for (var n = []; e; e = e.nextSibling) 1 === e.nodeType && e !== t && n.push(e);
                return n;
            },
            E = w.expr.match.needsContext;
        function C(e, t) {
            return e.nodeName && e.nodeName.toLowerCase() === t.toLowerCase();
        }
        var A = /^<([a-z][^\/\0>:\x20\t\r\n\f]*)[\x20\t\r\n\f]*\/?>(?:<\/\1>|)$/i;
        function L(e, t, n) {
            return m(t)
                ? w.grep(e, function (e, i) {
                    return !!t.call(e, i, e) !== n;
                })
                : t.nodeType
                    ? w.grep(e, function (e) {
                        return (e === t) !== n;
                    })
                    : "string" != typeof t
                        ? w.grep(e, function (e) {
                            return l.call(t, e) > -1 !== n;
                        })
                        : w.filter(t, e, n);
        }
        (w.filter = function (e, t, n) {
            var i = t[0];
            return (
                n && (e = ":not(" + e + ")"),
                    1 === t.length && 1 === i.nodeType
                        ? w.find.matchesSelector(i, e)
                            ? [i]
                            : []
                        : w.find.matches(
                            e,
                            w.grep(t, function (e) {
                                return 1 === e.nodeType;
                            })
                        )
            );
        }),
            w.fn.extend({
                find: function (e) {
                    var t,
                        n,
                        i = this.length,
                        o = this;
                    if ("string" != typeof e)
                        return this.pushStack(
                            w(e).filter(function () {
                                for (t = 0; t < i; t++) if (w.contains(o[t], this)) return !0;
                            })
                        );
                    for (n = this.pushStack([]), t = 0; t < i; t++) w.find(e, o[t], n);
                    return i > 1 ? w.uniqueSort(n) : n;
                },
                filter: function (e) {
                    return this.pushStack(L(this, e || [], !1));
                },
                not: function (e) {
                    return this.pushStack(L(this, e || [], !0));
                },
                is: function (e) {
                    return !!L(this, "string" == typeof e && E.test(e) ? w(e) : e || [], !1).length;
                },
            });
        var I,
            D = /^(?:\s*(<[\w\W]+>)[^>]*|#([\w-]+))$/;
        ((w.fn.init = function (e, t, n) {
            var o, s;
            if (!e) return this;
            if (((n = n || I), "string" == typeof e)) {
                if (!(o = "<" === e[0] && ">" === e[e.length - 1] && e.length >= 3 ? [null, e, null] : D.exec(e)) || (!o[1] && t)) return !t || t.jquery ? (t || n).find(e) : this.constructor(t).find(e);
                if (o[1]) {
                    if (((t = t instanceof w ? t[0] : t), w.merge(this, w.parseHTML(o[1], t && t.nodeType ? t.ownerDocument || t : i, !0)), A.test(o[1]) && w.isPlainObject(t))) for (o in t) m(this[o]) ? this[o](t[o]) : this.attr(o, t[o]);
                    return this;
                }
                return (s = i.getElementById(o[2])) && ((this[0] = s), (this.length = 1)), this;
            }
            return e.nodeType ? ((this[0] = e), (this.length = 1), this) : m(e) ? (void 0 !== n.ready ? n.ready(e) : e(w)) : w.makeArray(e, this);
        }).prototype = w.fn),
            (I = w(i));
        var P = /^(?:parents|prev(?:Until|All))/,
            O = { children: !0, contents: !0, next: !0, prev: !0 };
        function N(e, t) {
            for (; (e = e[t]) && 1 !== e.nodeType; );
            return e;
        }
        w.fn.extend({
            has: function (e) {
                var t = w(e, this),
                    n = t.length;
                return this.filter(function () {
                    for (var e = 0; e < n; e++) if (w.contains(this, t[e])) return !0;
                });
            },
            closest: function (e, t) {
                var n,
                    i = 0,
                    o = this.length,
                    s = [],
                    r = "string" != typeof e && w(e);
                if (!E.test(e))
                    for (; i < o; i++)
                        for (n = this[i]; n && n !== t; n = n.parentNode)
                            if (n.nodeType < 11 && (r ? r.index(n) > -1 : 1 === n.nodeType && w.find.matchesSelector(n, e))) {
                                s.push(n);
                                break;
                            }
                return this.pushStack(s.length > 1 ? w.uniqueSort(s) : s);
            },
            index: function (e) {
                return e ? ("string" == typeof e ? l.call(w(e), this[0]) : l.call(this, e.jquery ? e[0] : e)) : this[0] && this[0].parentNode ? this.first().prevAll().length : -1;
            },
            add: function (e, t) {
                return this.pushStack(w.uniqueSort(w.merge(this.get(), w(e, t))));
            },
            addBack: function (e) {
                return this.add(null == e ? this.prevObject : this.prevObject.filter(e));
            },
        }),
            w.each(
                {
                    parent: function (e) {
                        var t = e.parentNode;
                        return t && 11 !== t.nodeType ? t : null;
                    },
                    parents: function (e) {
                        return T(e, "parentNode");
                    },
                    parentsUntil: function (e, t, n) {
                        return T(e, "parentNode", n);
                    },
                    next: function (e) {
                        return N(e, "nextSibling");
                    },
                    prev: function (e) {
                        return N(e, "previousSibling");
                    },
                    nextAll: function (e) {
                        return T(e, "nextSibling");
                    },
                    prevAll: function (e) {
                        return T(e, "previousSibling");
                    },
                    nextUntil: function (e, t, n) {
                        return T(e, "nextSibling", n);
                    },
                    prevUntil: function (e, t, n) {
                        return T(e, "previousSibling", n);
                    },
                    siblings: function (e) {
                        return k((e.parentNode || {}).firstChild, e);
                    },
                    children: function (e) {
                        return k(e.firstChild);
                    },
                    contents: function (e) {
                        return C(e, "iframe") ? e.contentDocument : (C(e, "template") && (e = e.content || e), w.merge([], e.childNodes));
                    },
                },
                function (e, t) {
                    w.fn[e] = function (n, i) {
                        var o = w.map(this, t, n);
                        return "Until" !== e.slice(-5) && (i = n), i && "string" == typeof i && (o = w.filter(i, o)), this.length > 1 && (O[e] || w.uniqueSort(o), P.test(e) && o.reverse()), this.pushStack(o);
                    };
                }
            );
        var j = /[^\x20\t\r\n\f]+/g;
        function H(e) {
            return e;
        }
        function M(e) {
            throw e;
        }
        function $(e, t, n, i) {
            var o;
            try {
                e && m((o = e.promise)) ? o.call(e).done(t).fail(n) : e && m((o = e.then)) ? o.call(e, t, n) : t.apply(void 0, [e].slice(i));
            } catch (e) {
                n.apply(void 0, [e]);
            }
        }
        (w.Callbacks = function (e) {
            e =
                "string" == typeof e
                    ? (function (e) {
                        var t = {};
                        return (
                            w.each(e.match(j) || [], function (e, n) {
                                t[n] = !0;
                            }),
                                t
                        );
                    })(e)
                    : w.extend({}, e);
            var t,
                n,
                i,
                o,
                s = [],
                r = [],
                a = -1,
                l = function () {
                    for (o = o || e.once, i = t = !0; r.length; a = -1) for (n = r.shift(); ++a < s.length; ) !1 === s[a].apply(n[0], n[1]) && e.stopOnFalse && ((a = s.length), (n = !1));
                    e.memory || (n = !1), (t = !1), o && (s = n ? [] : "");
                },
                c = {
                    add: function () {
                        return (
                            s &&
                            (n && !t && ((a = s.length - 1), r.push(n)),
                                (function t(n) {
                                    w.each(n, function (n, i) {
                                        m(i) ? (e.unique && c.has(i)) || s.push(i) : i && i.length && "string" !== b(i) && t(i);
                                    });
                                })(arguments),
                            n && !t && l()),
                                this
                        );
                    },
                    remove: function () {
                        return (
                            w.each(arguments, function (e, t) {
                                for (var n; (n = w.inArray(t, s, n)) > -1; ) s.splice(n, 1), n <= a && a--;
                            }),
                                this
                        );
                    },
                    has: function (e) {
                        return e ? w.inArray(e, s) > -1 : s.length > 0;
                    },
                    empty: function () {
                        return s && (s = []), this;
                    },
                    disable: function () {
                        return (o = r = []), (s = n = ""), this;
                    },
                    disabled: function () {
                        return !s;
                    },
                    lock: function () {
                        return (o = r = []), n || t || (s = n = ""), this;
                    },
                    locked: function () {
                        return !!o;
                    },
                    fireWith: function (e, n) {
                        return o || ((n = [e, (n = n || []).slice ? n.slice() : n]), r.push(n), t || l()), this;
                    },
                    fire: function () {
                        return c.fireWith(this, arguments), this;
                    },
                    fired: function () {
                        return !!i;
                    },
                };
            return c;
        }),
            w.extend({
                Deferred: function (t) {
                    var n = [
                            ["notify", "progress", w.Callbacks("memory"), w.Callbacks("memory"), 2],
                            ["resolve", "done", w.Callbacks("once memory"), w.Callbacks("once memory"), 0, "resolved"],
                            ["reject", "fail", w.Callbacks("once memory"), w.Callbacks("once memory"), 1, "rejected"],
                        ],
                        i = "pending",
                        o = {
                            state: function () {
                                return i;
                            },
                            always: function () {
                                return s.done(arguments).fail(arguments), this;
                            },
                            catch: function (e) {
                                return o.then(null, e);
                            },
                            pipe: function () {
                                var e = arguments;
                                return w
                                    .Deferred(function (t) {
                                        w.each(n, function (n, i) {
                                            var o = m(e[i[4]]) && e[i[4]];
                                            s[i[1]](function () {
                                                var e = o && o.apply(this, arguments);
                                                e && m(e.promise) ? e.promise().progress(t.notify).done(t.resolve).fail(t.reject) : t[i[0] + "With"](this, o ? [e] : arguments);
                                            });
                                        }),
                                            (e = null);
                                    })
                                    .promise();
                            },
                            then: function (t, i, o) {
                                var s = 0;
                                function r(t, n, i, o) {
                                    return function () {
                                        var a = this,
                                            l = arguments,
                                            c = function () {
                                                var e, c;
                                                if (!(t < s)) {
                                                    if ((e = i.apply(a, l)) === n.promise()) throw new TypeError("Thenable self-resolution");
                                                    (c = e && ("object" == typeof e || "function" == typeof e) && e.then),
                                                        m(c)
                                                            ? o
                                                                ? c.call(e, r(s, n, H, o), r(s, n, M, o))
                                                                : (s++, c.call(e, r(s, n, H, o), r(s, n, M, o), r(s, n, H, n.notifyWith)))
                                                            : (i !== H && ((a = void 0), (l = [e])), (o || n.resolveWith)(a, l));
                                                }
                                            },
                                            d = o
                                                ? c
                                                : function () {
                                                    try {
                                                        c();
                                                    } catch (e) {
                                                        w.Deferred.exceptionHook && w.Deferred.exceptionHook(e, d.stackTrace), t + 1 >= s && (i !== M && ((a = void 0), (l = [e])), n.rejectWith(a, l));
                                                    }
                                                };
                                        t ? d() : (w.Deferred.getStackHook && (d.stackTrace = w.Deferred.getStackHook()), e.setTimeout(d));
                                    };
                                }
                                return w
                                    .Deferred(function (e) {
                                        n[0][3].add(r(0, e, m(o) ? o : H, e.notifyWith)), n[1][3].add(r(0, e, m(t) ? t : H)), n[2][3].add(r(0, e, m(i) ? i : M));
                                    })
                                    .promise();
                            },
                            promise: function (e) {
                                return null != e ? w.extend(e, o) : o;
                            },
                        },
                        s = {};
                    return (
                        w.each(n, function (e, t) {
                            var r = t[2],
                                a = t[5];
                            (o[t[1]] = r.add),
                            a &&
                            r.add(
                                function () {
                                    i = a;
                                },
                                n[3 - e][2].disable,
                                n[3 - e][3].disable,
                                n[0][2].lock,
                                n[0][3].lock
                            ),
                                r.add(t[3].fire),
                                (s[t[0]] = function () {
                                    return s[t[0] + "With"](this === s ? void 0 : this, arguments), this;
                                }),
                                (s[t[0] + "With"] = r.fireWith);
                        }),
                            o.promise(s),
                        t && t.call(s, s),
                            s
                    );
                },
                when: function (e) {
                    var t = arguments.length,
                        n = t,
                        i = Array(n),
                        o = s.call(arguments),
                        r = w.Deferred(),
                        a = function (e) {
                            return function (n) {
                                (i[e] = this), (o[e] = arguments.length > 1 ? s.call(arguments) : n), --t || r.resolveWith(i, o);
                            };
                        };
                    if (t <= 1 && ($(e, r.done(a(n)).resolve, r.reject, !t), "pending" === r.state() || m(o[n] && o[n].then))) return r.then();
                    for (; n--; ) $(o[n], a(n), r.reject);
                    return r.promise();
                },
            });
        var z = /^(Eval|Internal|Range|Reference|Syntax|Type|URI)Error$/;
        (w.Deferred.exceptionHook = function (t, n) {
            e.console && e.console.warn && t && z.test(t.name) && e.console.warn("jQuery.Deferred exception: " + t.message, t.stack, n);
        }),
            (w.readyException = function (t) {
                e.setTimeout(function () {
                    throw t;
                });
            });
        var q = w.Deferred();
        function W() {
            i.removeEventListener("DOMContentLoaded", W), e.removeEventListener("load", W), w.ready();
        }
        (w.fn.ready = function (e) {
            return (
                q.then(e).catch(function (e) {
                    w.readyException(e);
                }),
                    this
            );
        }),
            w.extend({
                isReady: !1,
                readyWait: 1,
                ready: function (e) {
                    (!0 === e ? --w.readyWait : w.isReady) || ((w.isReady = !0), (!0 !== e && --w.readyWait > 0) || q.resolveWith(i, [w]));
                },
            }),
            (w.ready.then = q.then),
            "complete" === i.readyState || ("loading" !== i.readyState && !i.documentElement.doScroll) ? e.setTimeout(w.ready) : (i.addEventListener("DOMContentLoaded", W), e.addEventListener("load", W));
        var R = function (e, t, n, i, o, s, r) {
                var a = 0,
                    l = e.length,
                    c = null == n;
                if ("object" === b(n)) for (a in ((o = !0), n)) R(e, t, a, n[a], !0, s, r);
                else if (
                    void 0 !== i &&
                    ((o = !0),
                    m(i) || (r = !0),
                    c &&
                    (r
                        ? (t.call(e, i), (t = null))
                        : ((c = t),
                            (t = function (e, t, n) {
                                return c.call(w(e), n);
                            }))),
                        t)
                )
                    for (; a < l; a++) t(e[a], n, r ? i : i.call(e[a], a, t(e[a], n)));
                return o ? e : c ? t.call(e) : l ? t(e[0], n) : s;
            },
            B = /^-ms-/,
            F = /-([a-z])/g;
        function U(e, t) {
            return t.toUpperCase();
        }
        function Q(e) {
            return e.replace(B, "ms-").replace(F, U);
        }
        var Y = function (e) {
            return 1 === e.nodeType || 9 === e.nodeType || !+e.nodeType;
        };
        function V() {
            this.expando = w.expando + V.uid++;
        }
        (V.uid = 1),
            (V.prototype = {
                cache: function (e) {
                    var t = e[this.expando];
                    return t || ((t = {}), Y(e) && (e.nodeType ? (e[this.expando] = t) : Object.defineProperty(e, this.expando, { value: t, configurable: !0 }))), t;
                },
                set: function (e, t, n) {
                    var i,
                        o = this.cache(e);
                    if ("string" == typeof t) o[Q(t)] = n;
                    else for (i in t) o[Q(i)] = t[i];
                    return o;
                },
                get: function (e, t) {
                    return void 0 === t ? this.cache(e) : e[this.expando] && e[this.expando][Q(t)];
                },
                access: function (e, t, n) {
                    return void 0 === t || (t && "string" == typeof t && void 0 === n) ? this.get(e, t) : (this.set(e, t, n), void 0 !== n ? n : t);
                },
                remove: function (e, t) {
                    var n,
                        i = e[this.expando];
                    if (void 0 !== i) {
                        if (void 0 !== t) {
                            n = (t = Array.isArray(t) ? t.map(Q) : (t = Q(t)) in i ? [t] : t.match(j) || []).length;
                            for (; n--; ) delete i[t[n]];
                        }
                        (void 0 === t || w.isEmptyObject(i)) && (e.nodeType ? (e[this.expando] = void 0) : delete e[this.expando]);
                    }
                },
                hasData: function (e) {
                    var t = e[this.expando];
                    return void 0 !== t && !w.isEmptyObject(t);
                },
            });
        var X = new V(),
            K = new V(),
            G = /^(?:\{[\w\W]*\}|\[[\w\W]*\])$/,
            J = /[A-Z]/g;
        function Z(e, t, n) {
            var i;
            if (void 0 === n && 1 === e.nodeType)
                if (((i = "data-" + t.replace(J, "-$&").toLowerCase()), "string" == typeof (n = e.getAttribute(i)))) {
                    try {
                        n = (function (e) {
                            return "true" === e || ("false" !== e && ("null" === e ? null : e === +e + "" ? +e : G.test(e) ? JSON.parse(e) : e));
                        })(n);
                    } catch (e) {}
                    K.set(e, t, n);
                } else n = void 0;
            return n;
        }
        w.extend({
            hasData: function (e) {
                return K.hasData(e) || X.hasData(e);
            },
            data: function (e, t, n) {
                return K.access(e, t, n);
            },
            removeData: function (e, t) {
                K.remove(e, t);
            },
            _data: function (e, t, n) {
                return X.access(e, t, n);
            },
            _removeData: function (e, t) {
                X.remove(e, t);
            },
        }),
            w.fn.extend({
                data: function (e, t) {
                    var n,
                        i,
                        o,
                        s = this[0],
                        r = s && s.attributes;
                    if (void 0 === e) {
                        if (this.length && ((o = K.get(s)), 1 === s.nodeType && !X.get(s, "hasDataAttrs"))) {
                            for (n = r.length; n--; ) r[n] && 0 === (i = r[n].name).indexOf("data-") && ((i = Q(i.slice(5))), Z(s, i, o[i]));
                            X.set(s, "hasDataAttrs", !0);
                        }
                        return o;
                    }
                    return "object" == typeof e
                        ? this.each(function () {
                            K.set(this, e);
                        })
                        : R(
                            this,
                            function (t) {
                                var n;
                                if (s && void 0 === t) {
                                    if (void 0 !== (n = K.get(s, e))) return n;
                                    if (void 0 !== (n = Z(s, e))) return n;
                                } else
                                    this.each(function () {
                                        K.set(this, e, t);
                                    });
                            },
                            null,
                            t,
                            arguments.length > 1,
                            null,
                            !0
                        );
                },
                removeData: function (e) {
                    return this.each(function () {
                        K.remove(this, e);
                    });
                },
            }),
            w.extend({
                queue: function (e, t, n) {
                    var i;
                    if (e) return (t = (t || "fx") + "queue"), (i = X.get(e, t)), n && (!i || Array.isArray(n) ? (i = X.access(e, t, w.makeArray(n))) : i.push(n)), i || [];
                },
                dequeue: function (e, t) {
                    t = t || "fx";
                    var n = w.queue(e, t),
                        i = n.length,
                        o = n.shift(),
                        s = w._queueHooks(e, t);
                    "inprogress" === o && ((o = n.shift()), i--),
                    o &&
                    ("fx" === t && n.unshift("inprogress"),
                        delete s.stop,
                        o.call(
                            e,
                            function () {
                                w.dequeue(e, t);
                            },
                            s
                        )),
                    !i && s && s.empty.fire();
                },
                _queueHooks: function (e, t) {
                    var n = t + "queueHooks";
                    return (
                        X.get(e, n) ||
                        X.access(e, n, {
                            empty: w.Callbacks("once memory").add(function () {
                                X.remove(e, [t + "queue", n]);
                            }),
                        })
                    );
                },
            }),
            w.fn.extend({
                queue: function (e, t) {
                    var n = 2;
                    return (
                        "string" != typeof e && ((t = e), (e = "fx"), n--),
                            arguments.length < n
                                ? w.queue(this[0], e)
                                : void 0 === t
                                    ? this
                                    : this.each(function () {
                                        var n = w.queue(this, e, t);
                                        w._queueHooks(this, e), "fx" === e && "inprogress" !== n[0] && w.dequeue(this, e);
                                    })
                    );
                },
                dequeue: function (e) {
                    return this.each(function () {
                        w.dequeue(this, e);
                    });
                },
                clearQueue: function (e) {
                    return this.queue(e || "fx", []);
                },
                promise: function (e, t) {
                    var n,
                        i = 1,
                        o = w.Deferred(),
                        s = this,
                        r = this.length,
                        a = function () {
                            --i || o.resolveWith(s, [s]);
                        };
                    for ("string" != typeof e && ((t = e), (e = void 0)), e = e || "fx"; r--; ) (n = X.get(s[r], e + "queueHooks")) && n.empty && (i++, n.empty.add(a));
                    return a(), o.promise(t);
                },
            });
        var ee = /[+-]?(?:\d*\.|)\d+(?:[eE][+-]?\d+|)/.source,
            te = new RegExp("^(?:([+-])=|)(" + ee + ")([a-z%]*)$", "i"),
            ne = ["Top", "Right", "Bottom", "Left"],
            ie = function (e, t) {
                return "none" === (e = t || e).style.display || ("" === e.style.display && w.contains(e.ownerDocument, e) && "none" === w.css(e, "display"));
            },
            oe = function (e, t, n, i) {
                var o,
                    s,
                    r = {};
                for (s in t) (r[s] = e.style[s]), (e.style[s] = t[s]);
                for (s in ((o = n.apply(e, i || [])), t)) e.style[s] = r[s];
                return o;
            };
        function se(e, t, n, i) {
            var o,
                s,
                r = 20,
                a = i
                    ? function () {
                        return i.cur();
                    }
                    : function () {
                        return w.css(e, t, "");
                    },
                l = a(),
                c = (n && n[3]) || (w.cssNumber[t] ? "" : "px"),
                d = (w.cssNumber[t] || ("px" !== c && +l)) && te.exec(w.css(e, t));
            if (d && d[3] !== c) {
                for (l /= 2, c = c || d[3], d = +l || 1; r--; ) w.style(e, t, d + c), (1 - s) * (1 - (s = a() / l || 0.5)) <= 0 && (r = 0), (d /= s);
                (d *= 2), w.style(e, t, d + c), (n = n || []);
            }
            return n && ((d = +d || +l || 0), (o = n[1] ? d + (n[1] + 1) * n[2] : +n[2]), i && ((i.unit = c), (i.start = d), (i.end = o))), o;
        }
        var re = {};
        function ae(e) {
            var t,
                n = e.ownerDocument,
                i = e.nodeName,
                o = re[i];
            return o || ((t = n.body.appendChild(n.createElement(i))), (o = w.css(t, "display")), t.parentNode.removeChild(t), "none" === o && (o = "block"), (re[i] = o), o);
        }
        function le(e, t) {
            for (var n, i, o = [], s = 0, r = e.length; s < r; s++)
                (i = e[s]).style &&
                ((n = i.style.display),
                    t ? ("none" === n && ((o[s] = X.get(i, "display") || null), o[s] || (i.style.display = "")), "" === i.style.display && ie(i) && (o[s] = ae(i))) : "none" !== n && ((o[s] = "none"), X.set(i, "display", n)));
            for (s = 0; s < r; s++) null != o[s] && (e[s].style.display = o[s]);
            return e;
        }
        w.fn.extend({
            show: function () {
                return le(this, !0);
            },
            hide: function () {
                return le(this);
            },
            toggle: function (e) {
                return "boolean" == typeof e
                    ? e
                        ? this.show()
                        : this.hide()
                    : this.each(function () {
                        ie(this) ? w(this).show() : w(this).hide();
                    });
            },
        });
        var ce = /^(?:checkbox|radio)$/i,
            de = /<([a-z][^\/\0>\x20\t\r\n\f]+)/i,
            ue = /^$|^module$|\/(?:java|ecma)script/i,
            he = {
                option: [1, "<select multiple='multiple'>", "</select>"],
                thead: [1, "<table>", "</table>"],
                col: [2, "<table><colgroup>", "</colgroup></table>"],
                tr: [2, "<table><tbody>", "</tbody></table>"],
                td: [3, "<table><tbody><tr>", "</tr></tbody></table>"],
                _default: [0, "", ""],
            };
        function pe(e, t) {
            var n;
            return (n = void 0 !== e.getElementsByTagName ? e.getElementsByTagName(t || "*") : void 0 !== e.querySelectorAll ? e.querySelectorAll(t || "*") : []), void 0 === t || (t && C(e, t)) ? w.merge([e], n) : n;
        }
        function fe(e, t) {
            for (var n = 0, i = e.length; n < i; n++) X.set(e[n], "globalEval", !t || X.get(t[n], "globalEval"));
        }
        (he.optgroup = he.option), (he.tbody = he.tfoot = he.colgroup = he.caption = he.thead), (he.th = he.td);
        var me = /<|&#?\w+;/;
        function ge(e, t, n, i, o) {
            for (var s, r, a, l, c, d, u = t.createDocumentFragment(), h = [], p = 0, f = e.length; p < f; p++)
                if ((s = e[p]) || 0 === s)
                    if ("object" === b(s)) w.merge(h, s.nodeType ? [s] : s);
                    else if (me.test(s)) {
                        for (r = r || u.appendChild(t.createElement("div")), a = (de.exec(s) || ["", ""])[1].toLowerCase(), l = he[a] || he._default, r.innerHTML = l[1] + w.htmlPrefilter(s) + l[2], d = l[0]; d--; ) r = r.lastChild;
                        w.merge(h, r.childNodes), ((r = u.firstChild).textContent = "");
                    } else h.push(t.createTextNode(s));
            for (u.textContent = "", p = 0; (s = h[p++]); )
                if (i && w.inArray(s, i) > -1) o && o.push(s);
                else if (((c = w.contains(s.ownerDocument, s)), (r = pe(u.appendChild(s), "script")), c && fe(r), n)) for (d = 0; (s = r[d++]); ) ue.test(s.type || "") && n.push(s);
            return u;
        }
        !(function () {
            var e = i.createDocumentFragment().appendChild(i.createElement("div")),
                t = i.createElement("input");
            t.setAttribute("type", "radio"),
                t.setAttribute("checked", "checked"),
                t.setAttribute("name", "t"),
                e.appendChild(t),
                (f.checkClone = e.cloneNode(!0).cloneNode(!0).lastChild.checked),
                (e.innerHTML = "<textarea>x</textarea>"),
                (f.noCloneChecked = !!e.cloneNode(!0).lastChild.defaultValue);
        })();
        var ve = i.documentElement,
            ye = /^key/,
            be = /^(?:mouse|pointer|contextmenu|drag|drop)|click/,
            we = /^([^.]*)(?:\.(.+)|)/;
        function _e() {
            return !0;
        }
        function Se() {
            return !1;
        }
        function xe() {
            try {
                return i.activeElement;
            } catch (e) {}
        }
        function Te(e, t, n, i, o, s) {
            var r, a;
            if ("object" == typeof t) {
                for (a in ("string" != typeof n && ((i = i || n), (n = void 0)), t)) Te(e, a, n, i, t[a], s);
                return e;
            }
            if ((null == i && null == o ? ((o = n), (i = n = void 0)) : null == o && ("string" == typeof n ? ((o = i), (i = void 0)) : ((o = i), (i = n), (n = void 0))), !1 === o)) o = Se;
            else if (!o) return e;
            return (
                1 === s &&
                ((r = o),
                    ((o = function (e) {
                        return w().off(e), r.apply(this, arguments);
                    }).guid = r.guid || (r.guid = w.guid++))),
                    e.each(function () {
                        w.event.add(this, t, o, i, n);
                    })
            );
        }
        (w.event = {
            global: {},
            add: function (e, t, n, i, o) {
                var s,
                    r,
                    a,
                    l,
                    c,
                    d,
                    u,
                    h,
                    p,
                    f,
                    m,
                    g = X.get(e);
                if (g)
                    for (
                        n.handler && ((n = (s = n).handler), (o = s.selector)),
                        o && w.find.matchesSelector(ve, o),
                        n.guid || (n.guid = w.guid++),
                        (l = g.events) || (l = g.events = {}),
                        (r = g.handle) ||
                        (r = g.handle = function (t) {
                            return void 0 !== w && w.event.triggered !== t.type ? w.event.dispatch.apply(e, arguments) : void 0;
                        }),
                            c = (t = (t || "").match(j) || [""]).length;
                        c--;

                    )
                        (p = m = (a = we.exec(t[c]) || [])[1]),
                            (f = (a[2] || "").split(".").sort()),
                        p &&
                        ((u = w.event.special[p] || {}),
                            (p = (o ? u.delegateType : u.bindType) || p),
                            (u = w.event.special[p] || {}),
                            (d = w.extend({ type: p, origType: m, data: i, handler: n, guid: n.guid, selector: o, needsContext: o && w.expr.match.needsContext.test(o), namespace: f.join(".") }, s)),
                        (h = l[p]) || (((h = l[p] = []).delegateCount = 0), (u.setup && !1 !== u.setup.call(e, i, f, r)) || (e.addEventListener && e.addEventListener(p, r))),
                        u.add && (u.add.call(e, d), d.handler.guid || (d.handler.guid = n.guid)),
                            o ? h.splice(h.delegateCount++, 0, d) : h.push(d),
                            (w.event.global[p] = !0));
            },
            remove: function (e, t, n, i, o) {
                var s,
                    r,
                    a,
                    l,
                    c,
                    d,
                    u,
                    h,
                    p,
                    f,
                    m,
                    g = X.hasData(e) && X.get(e);
                if (g && (l = g.events)) {
                    for (c = (t = (t || "").match(j) || [""]).length; c--; )
                        if (((p = m = (a = we.exec(t[c]) || [])[1]), (f = (a[2] || "").split(".").sort()), p)) {
                            for (u = w.event.special[p] || {}, h = l[(p = (i ? u.delegateType : u.bindType) || p)] || [], a = a[2] && new RegExp("(^|\\.)" + f.join("\\.(?:.*\\.|)") + "(\\.|$)"), r = s = h.length; s--; )
                                (d = h[s]),
                                (!o && m !== d.origType) ||
                                (n && n.guid !== d.guid) ||
                                (a && !a.test(d.namespace)) ||
                                (i && i !== d.selector && ("**" !== i || !d.selector)) ||
                                (h.splice(s, 1), d.selector && h.delegateCount--, u.remove && u.remove.call(e, d));
                            r && !h.length && ((u.teardown && !1 !== u.teardown.call(e, f, g.handle)) || w.removeEvent(e, p, g.handle), delete l[p]);
                        } else for (p in l) w.event.remove(e, p + t[c], n, i, !0);
                    w.isEmptyObject(l) && X.remove(e, "handle events");
                }
            },
            dispatch: function (e) {
                var t,
                    n,
                    i,
                    o,
                    s,
                    r,
                    a = w.event.fix(e),
                    l = new Array(arguments.length),
                    c = (X.get(this, "events") || {})[a.type] || [],
                    d = w.event.special[a.type] || {};
                for (l[0] = a, t = 1; t < arguments.length; t++) l[t] = arguments[t];
                if (((a.delegateTarget = this), !d.preDispatch || !1 !== d.preDispatch.call(this, a))) {
                    for (r = w.event.handlers.call(this, a, c), t = 0; (o = r[t++]) && !a.isPropagationStopped(); )
                        for (a.currentTarget = o.elem, n = 0; (s = o.handlers[n++]) && !a.isImmediatePropagationStopped(); )
                            (a.rnamespace && !a.rnamespace.test(s.namespace)) ||
                            ((a.handleObj = s), (a.data = s.data), void 0 !== (i = ((w.event.special[s.origType] || {}).handle || s.handler).apply(o.elem, l)) && !1 === (a.result = i) && (a.preventDefault(), a.stopPropagation()));
                    return d.postDispatch && d.postDispatch.call(this, a), a.result;
                }
            },
            handlers: function (e, t) {
                var n,
                    i,
                    o,
                    s,
                    r,
                    a = [],
                    l = t.delegateCount,
                    c = e.target;
                if (l && c.nodeType && !("click" === e.type && e.button >= 1))
                    for (; c !== this; c = c.parentNode || this)
                        if (1 === c.nodeType && ("click" !== e.type || !0 !== c.disabled)) {
                            for (s = [], r = {}, n = 0; n < l; n++) void 0 === r[(o = (i = t[n]).selector + " ")] && (r[o] = i.needsContext ? w(o, this).index(c) > -1 : w.find(o, this, null, [c]).length), r[o] && s.push(i);
                            s.length && a.push({ elem: c, handlers: s });
                        }
                return (c = this), l < t.length && a.push({ elem: c, handlers: t.slice(l) }), a;
            },
            addProp: function (e, t) {
                Object.defineProperty(w.Event.prototype, e, {
                    enumerable: !0,
                    configurable: !0,
                    get: m(t)
                        ? function () {
                            if (this.originalEvent) return t(this.originalEvent);
                        }
                        : function () {
                            if (this.originalEvent) return this.originalEvent[e];
                        },
                    set: function (t) {
                        Object.defineProperty(this, e, { enumerable: !0, configurable: !0, writable: !0, value: t });
                    },
                });
            },
            fix: function (e) {
                return e[w.expando] ? e : new w.Event(e);
            },
            special: {
                load: { noBubble: !0 },
                focus: {
                    trigger: function () {
                        if (this !== xe() && this.focus) return this.focus(), !1;
                    },
                    delegateType: "focusin",
                },
                blur: {
                    trigger: function () {
                        if (this === xe() && this.blur) return this.blur(), !1;
                    },
                    delegateType: "focusout",
                },
                click: {
                    trigger: function () {
                        if ("checkbox" === this.type && this.click && C(this, "input")) return this.click(), !1;
                    },
                    _default: function (e) {
                        return C(e.target, "a");
                    },
                },
                beforeunload: {
                    postDispatch: function (e) {
                        void 0 !== e.result && e.originalEvent && (e.originalEvent.returnValue = e.result);
                    },
                },
            },
        }),
            (w.removeEvent = function (e, t, n) {
                e.removeEventListener && e.removeEventListener(t, n);
            }),
            (w.Event = function (e, t) {
                if (!(this instanceof w.Event)) return new w.Event(e, t);
                e && e.type
                    ? ((this.originalEvent = e),
                        (this.type = e.type),
                        (this.isDefaultPrevented = e.defaultPrevented || (void 0 === e.defaultPrevented && !1 === e.returnValue) ? _e : Se),
                        (this.target = e.target && 3 === e.target.nodeType ? e.target.parentNode : e.target),
                        (this.currentTarget = e.currentTarget),
                        (this.relatedTarget = e.relatedTarget))
                    : (this.type = e),
                t && w.extend(this, t),
                    (this.timeStamp = (e && e.timeStamp) || Date.now()),
                    (this[w.expando] = !0);
            }),
            (w.Event.prototype = {
                constructor: w.Event,
                isDefaultPrevented: Se,
                isPropagationStopped: Se,
                isImmediatePropagationStopped: Se,
                isSimulated: !1,
                preventDefault: function () {
                    var e = this.originalEvent;
                    (this.isDefaultPrevented = _e), e && !this.isSimulated && e.preventDefault();
                },
                stopPropagation: function () {
                    var e = this.originalEvent;
                    (this.isPropagationStopped = _e), e && !this.isSimulated && e.stopPropagation();
                },
                stopImmediatePropagation: function () {
                    var e = this.originalEvent;
                    (this.isImmediatePropagationStopped = _e), e && !this.isSimulated && e.stopImmediatePropagation(), this.stopPropagation();
                },
            }),
            w.each(
                {
                    altKey: !0,
                    bubbles: !0,
                    cancelable: !0,
                    changedTouches: !0,
                    ctrlKey: !0,
                    detail: !0,
                    eventPhase: !0,
                    metaKey: !0,
                    pageX: !0,
                    pageY: !0,
                    shiftKey: !0,
                    view: !0,
                    char: !0,
                    charCode: !0,
                    key: !0,
                    keyCode: !0,
                    button: !0,
                    buttons: !0,
                    clientX: !0,
                    clientY: !0,
                    offsetX: !0,
                    offsetY: !0,
                    pointerId: !0,
                    pointerType: !0,
                    screenX: !0,
                    screenY: !0,
                    targetTouches: !0,
                    toElement: !0,
                    touches: !0,
                    which: function (e) {
                        var t = e.button;
                        return null == e.which && ye.test(e.type) ? (null != e.charCode ? e.charCode : e.keyCode) : !e.which && void 0 !== t && be.test(e.type) ? (1 & t ? 1 : 2 & t ? 3 : 4 & t ? 2 : 0) : e.which;
                    },
                },
                w.event.addProp
            ),
            w.each({ mouseenter: "mouseover", mouseleave: "mouseout", pointerenter: "pointerover", pointerleave: "pointerout" }, function (e, t) {
                w.event.special[e] = {
                    delegateType: t,
                    bindType: t,
                    handle: function (e) {
                        var n,
                            i = e.relatedTarget,
                            o = e.handleObj;
                        return (i && (i === this || w.contains(this, i))) || ((e.type = o.origType), (n = o.handler.apply(this, arguments)), (e.type = t)), n;
                    },
                };
            }),
            w.fn.extend({
                on: function (e, t, n, i) {
                    return Te(this, e, t, n, i);
                },
                one: function (e, t, n, i) {
                    return Te(this, e, t, n, i, 1);
                },
                off: function (e, t, n) {
                    var i, o;
                    if (e && e.preventDefault && e.handleObj) return (i = e.handleObj), w(e.delegateTarget).off(i.namespace ? i.origType + "." + i.namespace : i.origType, i.selector, i.handler), this;
                    if ("object" == typeof e) {
                        for (o in e) this.off(o, t, e[o]);
                        return this;
                    }
                    return (
                        (!1 !== t && "function" != typeof t) || ((n = t), (t = void 0)),
                        !1 === n && (n = Se),
                            this.each(function () {
                                w.event.remove(this, e, n, t);
                            })
                    );
                },
            });
        var ke = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([a-z][^\/\0>\x20\t\r\n\f]*)[^>]*)\/>/gi,
            Ee = /<script|<style|<link/i,
            Ce = /checked\s*(?:[^=]|=\s*.checked.)/i,
            Ae = /^\s*<!(?:\[CDATA\[|--)|(?:\]\]|--)>\s*$/g;
        function Le(e, t) {
            return (C(e, "table") && C(11 !== t.nodeType ? t : t.firstChild, "tr") && w(e).children("tbody")[0]) || e;
        }
        function Ie(e) {
            return (e.type = (null !== e.getAttribute("type")) + "/" + e.type), e;
        }
        function De(e) {
            return "true/" === (e.type || "").slice(0, 5) ? (e.type = e.type.slice(5)) : e.removeAttribute("type"), e;
        }
        function Pe(e, t) {
            var n, i, o, s, r, a, l, c;
            if (1 === t.nodeType) {
                if (X.hasData(e) && ((s = X.access(e)), (r = X.set(t, s)), (c = s.events))) for (o in (delete r.handle, (r.events = {}), c)) for (n = 0, i = c[o].length; n < i; n++) w.event.add(t, o, c[o][n]);
                K.hasData(e) && ((a = K.access(e)), (l = w.extend({}, a)), K.set(t, l));
            }
        }
        function Oe(e, t) {
            var n = t.nodeName.toLowerCase();
            "input" === n && ce.test(e.type) ? (t.checked = e.checked) : ("input" !== n && "textarea" !== n) || (t.defaultValue = e.defaultValue);
        }
        function Ne(e, t, n, i) {
            t = r.apply([], t);
            var o,
                s,
                a,
                l,
                c,
                d,
                u = 0,
                h = e.length,
                p = h - 1,
                g = t[0],
                v = m(g);
            if (v || (h > 1 && "string" == typeof g && !f.checkClone && Ce.test(g)))
                return e.each(function (o) {
                    var s = e.eq(o);
                    v && (t[0] = g.call(this, o, s.html())), Ne(s, t, n, i);
                });
            if (h && ((s = (o = ge(t, e[0].ownerDocument, !1, e, i)).firstChild), 1 === o.childNodes.length && (o = s), s || i)) {
                for (l = (a = w.map(pe(o, "script"), Ie)).length; u < h; u++) (c = o), u !== p && ((c = w.clone(c, !0, !0)), l && w.merge(a, pe(c, "script"))), n.call(e[u], c, u);
                if (l)
                    for (d = a[a.length - 1].ownerDocument, w.map(a, De), u = 0; u < l; u++)
                        (c = a[u]), ue.test(c.type || "") && !X.access(c, "globalEval") && w.contains(d, c) && (c.src && "module" !== (c.type || "").toLowerCase() ? w._evalUrl && w._evalUrl(c.src) : y(c.textContent.replace(Ae, ""), d, c));
            }
            return e;
        }
        function je(e, t, n) {
            for (var i, o = t ? w.filter(t, e) : e, s = 0; null != (i = o[s]); s++) n || 1 !== i.nodeType || w.cleanData(pe(i)), i.parentNode && (n && w.contains(i.ownerDocument, i) && fe(pe(i, "script")), i.parentNode.removeChild(i));
            return e;
        }
        w.extend({
            htmlPrefilter: function (e) {
                return e.replace(ke, "<$1></$2>");
            },
            clone: function (e, t, n) {
                var i,
                    o,
                    s,
                    r,
                    a = e.cloneNode(!0),
                    l = w.contains(e.ownerDocument, e);
                if (!(f.noCloneChecked || (1 !== e.nodeType && 11 !== e.nodeType) || w.isXMLDoc(e))) for (r = pe(a), i = 0, o = (s = pe(e)).length; i < o; i++) Oe(s[i], r[i]);
                if (t)
                    if (n) for (s = s || pe(e), r = r || pe(a), i = 0, o = s.length; i < o; i++) Pe(s[i], r[i]);
                    else Pe(e, a);
                return (r = pe(a, "script")).length > 0 && fe(r, !l && pe(e, "script")), a;
            },
            cleanData: function (e) {
                for (var t, n, i, o = w.event.special, s = 0; void 0 !== (n = e[s]); s++)
                    if (Y(n)) {
                        if ((t = n[X.expando])) {
                            if (t.events) for (i in t.events) o[i] ? w.event.remove(n, i) : w.removeEvent(n, i, t.handle);
                            n[X.expando] = void 0;
                        }
                        n[K.expando] && (n[K.expando] = void 0);
                    }
            },
        }),
            w.fn.extend({
                detach: function (e) {
                    return je(this, e, !0);
                },
                remove: function (e) {
                    return je(this, e);
                },
                text: function (e) {
                    return R(
                        this,
                        function (e) {
                            return void 0 === e
                                ? w.text(this)
                                : this.empty().each(function () {
                                    (1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType) || (this.textContent = e);
                                });
                        },
                        null,
                        e,
                        arguments.length
                    );
                },
                append: function () {
                    return Ne(this, arguments, function (e) {
                        (1 !== this.nodeType && 11 !== this.nodeType && 9 !== this.nodeType) || Le(this, e).appendChild(e);
                    });
                },
                prepend: function () {
                    return Ne(this, arguments, function (e) {
                        if (1 === this.nodeType || 11 === this.nodeType || 9 === this.nodeType) {
                            var t = Le(this, e);
                            t.insertBefore(e, t.firstChild);
                        }
                    });
                },
                before: function () {
                    return Ne(this, arguments, function (e) {
                        this.parentNode && this.parentNode.insertBefore(e, this);
                    });
                },
                after: function () {
                    return Ne(this, arguments, function (e) {
                        this.parentNode && this.parentNode.insertBefore(e, this.nextSibling);
                    });
                },
                empty: function () {
                    for (var e, t = 0; null != (e = this[t]); t++) 1 === e.nodeType && (w.cleanData(pe(e, !1)), (e.textContent = ""));
                    return this;
                },
                clone: function (e, t) {
                    return (
                        (e = null != e && e),
                            (t = null == t ? e : t),
                            this.map(function () {
                                return w.clone(this, e, t);
                            })
                    );
                },
                html: function (e) {
                    return R(
                        this,
                        function (e) {
                            var t = this[0] || {},
                                n = 0,
                                i = this.length;
                            if (void 0 === e && 1 === t.nodeType) return t.innerHTML;
                            if ("string" == typeof e && !Ee.test(e) && !he[(de.exec(e) || ["", ""])[1].toLowerCase()]) {
                                e = w.htmlPrefilter(e);
                                try {
                                    for (; n < i; n++) 1 === (t = this[n] || {}).nodeType && (w.cleanData(pe(t, !1)), (t.innerHTML = e));
                                    t = 0;
                                } catch (e) {}
                            }
                            t && this.empty().append(e);
                        },
                        null,
                        e,
                        arguments.length
                    );
                },
                replaceWith: function () {
                    var e = [];
                    return Ne(
                        this,
                        arguments,
                        function (t) {
                            var n = this.parentNode;
                            w.inArray(this, e) < 0 && (w.cleanData(pe(this)), n && n.replaceChild(t, this));
                        },
                        e
                    );
                },
            }),
            w.each({ appendTo: "append", prependTo: "prepend", insertBefore: "before", insertAfter: "after", replaceAll: "replaceWith" }, function (e, t) {
                w.fn[e] = function (e) {
                    for (var n, i = [], o = w(e), s = o.length - 1, r = 0; r <= s; r++) (n = r === s ? this : this.clone(!0)), w(o[r])[t](n), a.apply(i, n.get());
                    return this.pushStack(i);
                };
            });
        var He = new RegExp("^(" + ee + ")(?!px)[a-z%]+$", "i"),
            Me = function (t) {
                var n = t.ownerDocument.defaultView;
                return (n && n.opener) || (n = e), n.getComputedStyle(t);
            },
            $e = new RegExp(ne.join("|"), "i");
        function ze(e, t, n) {
            var i,
                o,
                s,
                r,
                a = e.style;
            return (
                (n = n || Me(e)) &&
                ("" !== (r = n.getPropertyValue(t) || n[t]) || w.contains(e.ownerDocument, e) || (r = w.style(e, t)),
                !f.pixelBoxStyles() && He.test(r) && $e.test(t) && ((i = a.width), (o = a.minWidth), (s = a.maxWidth), (a.minWidth = a.maxWidth = a.width = r), (r = n.width), (a.width = i), (a.minWidth = o), (a.maxWidth = s))),
                    void 0 !== r ? r + "" : r
            );
        }
        function qe(e, t) {
            return {
                get: function () {
                    if (!e()) return (this.get = t).apply(this, arguments);
                    delete this.get;
                },
            };
        }
        !(function () {
            function t() {
                if (d) {
                    (c.style.cssText = "position:absolute;left:-11111px;width:60px;margin-top:1px;padding:0;border:0"),
                        (d.style.cssText = "position:relative;display:block;box-sizing:border-box;overflow:scroll;margin:auto;border:1px;padding:1px;width:60%;top:1%"),
                        ve.appendChild(c).appendChild(d);
                    var t = e.getComputedStyle(d);
                    (o = "1%" !== t.top),
                        (l = 12 === n(t.marginLeft)),
                        (d.style.right = "60%"),
                        (a = 36 === n(t.right)),
                        (s = 36 === n(t.width)),
                        (d.style.position = "absolute"),
                        (r = 36 === d.offsetWidth || "absolute"),
                        ve.removeChild(c),
                        (d = null);
                }
            }
            function n(e) {
                return Math.round(parseFloat(e));
            }
            var o,
                s,
                r,
                a,
                l,
                c = i.createElement("div"),
                d = i.createElement("div");
            d.style &&
            ((d.style.backgroundClip = "content-box"),
                (d.cloneNode(!0).style.backgroundClip = ""),
                (f.clearCloneStyle = "content-box" === d.style.backgroundClip),
                w.extend(f, {
                    boxSizingReliable: function () {
                        return t(), s;
                    },
                    pixelBoxStyles: function () {
                        return t(), a;
                    },
                    pixelPosition: function () {
                        return t(), o;
                    },
                    reliableMarginLeft: function () {
                        return t(), l;
                    },
                    scrollboxSize: function () {
                        return t(), r;
                    },
                }));
        })();
        var We = /^(none|table(?!-c[ea]).+)/,
            Re = /^--/,
            Be = { position: "absolute", visibility: "hidden", display: "block" },
            Fe = { letterSpacing: "0", fontWeight: "400" },
            Ue = ["Webkit", "Moz", "ms"],
            Qe = i.createElement("div").style;
        function Ye(e) {
            var t = w.cssProps[e];
            return (
                t ||
                (t = w.cssProps[e] =
                    (function (e) {
                        if (e in Qe) return e;
                        for (var t = e[0].toUpperCase() + e.slice(1), n = Ue.length; n--; ) if ((e = Ue[n] + t) in Qe) return e;
                    })(e) || e),
                    t
            );
        }
        function Ve(e, t, n) {
            var i = te.exec(t);
            return i ? Math.max(0, i[2] - (n || 0)) + (i[3] || "px") : t;
        }
        function Xe(e, t, n, i, o, s) {
            var r = "width" === t ? 1 : 0,
                a = 0,
                l = 0;
            if (n === (i ? "border" : "content")) return 0;
            for (; r < 4; r += 2)
                "margin" === n && (l += w.css(e, n + ne[r], !0, o)),
                    i
                        ? ("content" === n && (l -= w.css(e, "padding" + ne[r], !0, o)), "margin" !== n && (l -= w.css(e, "border" + ne[r] + "Width", !0, o)))
                        : ((l += w.css(e, "padding" + ne[r], !0, o)), "padding" !== n ? (l += w.css(e, "border" + ne[r] + "Width", !0, o)) : (a += w.css(e, "border" + ne[r] + "Width", !0, o)));
            return !i && s >= 0 && (l += Math.max(0, Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - s - l - a - 0.5))), l;
        }
        function Ke(e, t, n) {
            var i = Me(e),
                o = ze(e, t, i),
                s = "border-box" === w.css(e, "boxSizing", !1, i),
                r = s;
            if (He.test(o)) {
                if (!n) return o;
                o = "auto";
            }
            return (
                (r = r && (f.boxSizingReliable() || o === e.style[t])),
                ("auto" === o || (!parseFloat(o) && "inline" === w.css(e, "display", !1, i))) && ((o = e["offset" + t[0].toUpperCase() + t.slice(1)]), (r = !0)),
                (o = parseFloat(o) || 0) + Xe(e, t, n || (s ? "border" : "content"), r, i, o) + "px"
            );
        }
        function Ge(e, t, n, i, o) {
            return new Ge.prototype.init(e, t, n, i, o);
        }
        w.extend({
            cssHooks: {
                opacity: {
                    get: function (e, t) {
                        if (t) {
                            var n = ze(e, "opacity");
                            return "" === n ? "1" : n;
                        }
                    },
                },
            },
            cssNumber: { animationIterationCount: !0, columnCount: !0, fillOpacity: !0, flexGrow: !0, flexShrink: !0, fontWeight: !0, lineHeight: !0, opacity: !0, order: !0, orphans: !0, widows: !0, zIndex: !0, zoom: !0 },
            cssProps: {},
            style: function (e, t, n, i) {
                if (e && 3 !== e.nodeType && 8 !== e.nodeType && e.style) {
                    var o,
                        s,
                        r,
                        a = Q(t),
                        l = Re.test(t),
                        c = e.style;
                    if ((l || (t = Ye(a)), (r = w.cssHooks[t] || w.cssHooks[a]), void 0 === n)) return r && "get" in r && void 0 !== (o = r.get(e, !1, i)) ? o : c[t];
                    "string" == (s = typeof n) && (o = te.exec(n)) && o[1] && ((n = se(e, t, o)), (s = "number")),
                    null != n &&
                    n == n &&
                    ("number" === s && (n += (o && o[3]) || (w.cssNumber[a] ? "" : "px")),
                    f.clearCloneStyle || "" !== n || 0 !== t.indexOf("background") || (c[t] = "inherit"),
                    (r && "set" in r && void 0 === (n = r.set(e, n, i))) || (l ? c.setProperty(t, n) : (c[t] = n)));
                }
            },
            css: function (e, t, n, i) {
                var o,
                    s,
                    r,
                    a = Q(t);
                return (
                    Re.test(t) || (t = Ye(a)),
                    (r = w.cssHooks[t] || w.cssHooks[a]) && "get" in r && (o = r.get(e, !0, n)),
                    void 0 === o && (o = ze(e, t, i)),
                    "normal" === o && t in Fe && (o = Fe[t]),
                        "" === n || n ? ((s = parseFloat(o)), !0 === n || isFinite(s) ? s || 0 : o) : o
                );
            },
        }),
            w.each(["height", "width"], function (e, t) {
                w.cssHooks[t] = {
                    get: function (e, n, i) {
                        if (n)
                            return !We.test(w.css(e, "display")) || (e.getClientRects().length && e.getBoundingClientRect().width)
                                ? Ke(e, t, i)
                                : oe(e, Be, function () {
                                    return Ke(e, t, i);
                                });
                    },
                    set: function (e, n, i) {
                        var o,
                            s = Me(e),
                            r = "border-box" === w.css(e, "boxSizing", !1, s),
                            a = i && Xe(e, t, i, r, s);
                        return (
                            r && f.scrollboxSize() === s.position && (a -= Math.ceil(e["offset" + t[0].toUpperCase() + t.slice(1)] - parseFloat(s[t]) - Xe(e, t, "border", !1, s) - 0.5)),
                            a && (o = te.exec(n)) && "px" !== (o[3] || "px") && ((e.style[t] = n), (n = w.css(e, t))),
                                Ve(0, n, a)
                        );
                    },
                };
            }),
            (w.cssHooks.marginLeft = qe(f.reliableMarginLeft, function (e, t) {
                if (t)
                    return (
                        (parseFloat(ze(e, "marginLeft")) ||
                            e.getBoundingClientRect().left -
                            oe(e, { marginLeft: 0 }, function () {
                                return e.getBoundingClientRect().left;
                            })) + "px"
                    );
            })),
            w.each({ margin: "", padding: "", border: "Width" }, function (e, t) {
                (w.cssHooks[e + t] = {
                    expand: function (n) {
                        for (var i = 0, o = {}, s = "string" == typeof n ? n.split(" ") : [n]; i < 4; i++) o[e + ne[i] + t] = s[i] || s[i - 2] || s[0];
                        return o;
                    },
                }),
                "margin" !== e && (w.cssHooks[e + t].set = Ve);
            }),
            w.fn.extend({
                css: function (e, t) {
                    return R(
                        this,
                        function (e, t, n) {
                            var i,
                                o,
                                s = {},
                                r = 0;
                            if (Array.isArray(t)) {
                                for (i = Me(e), o = t.length; r < o; r++) s[t[r]] = w.css(e, t[r], !1, i);
                                return s;
                            }
                            return void 0 !== n ? w.style(e, t, n) : w.css(e, t);
                        },
                        e,
                        t,
                        arguments.length > 1
                    );
                },
            }),
            (w.Tween = Ge),
            (Ge.prototype = {
                constructor: Ge,
                init: function (e, t, n, i, o, s) {
                    (this.elem = e), (this.prop = n), (this.easing = o || w.easing._default), (this.options = t), (this.start = this.now = this.cur()), (this.end = i), (this.unit = s || (w.cssNumber[n] ? "" : "px"));
                },
                cur: function () {
                    var e = Ge.propHooks[this.prop];
                    return e && e.get ? e.get(this) : Ge.propHooks._default.get(this);
                },
                run: function (e) {
                    var t,
                        n = Ge.propHooks[this.prop];
                    return (
                        this.options.duration ? (this.pos = t = w.easing[this.easing](e, this.options.duration * e, 0, 1, this.options.duration)) : (this.pos = t = e),
                            (this.now = (this.end - this.start) * t + this.start),
                        this.options.step && this.options.step.call(this.elem, this.now, this),
                            n && n.set ? n.set(this) : Ge.propHooks._default.set(this),
                            this
                    );
                },
            }),
            (Ge.prototype.init.prototype = Ge.prototype),
            (Ge.propHooks = {
                _default: {
                    get: function (e) {
                        var t;
                        return 1 !== e.elem.nodeType || (null != e.elem[e.prop] && null == e.elem.style[e.prop]) ? e.elem[e.prop] : (t = w.css(e.elem, e.prop, "")) && "auto" !== t ? t : 0;
                    },
                    set: function (e) {
                        w.fx.step[e.prop] ? w.fx.step[e.prop](e) : 1 !== e.elem.nodeType || (null == e.elem.style[w.cssProps[e.prop]] && !w.cssHooks[e.prop]) ? (e.elem[e.prop] = e.now) : w.style(e.elem, e.prop, e.now + e.unit);
                    },
                },
            }),
            (Ge.propHooks.scrollTop = Ge.propHooks.scrollLeft = {
                set: function (e) {
                    e.elem.nodeType && e.elem.parentNode && (e.elem[e.prop] = e.now);
                },
            }),
            (w.easing = {
                linear: function (e) {
                    return e;
                },
                swing: function (e) {
                    return 0.5 - Math.cos(e * Math.PI) / 2;
                },
                _default: "swing",
            }),
            (w.fx = Ge.prototype.init),
            (w.fx.step = {});
        var Je,
            Ze,
            et = /^(?:toggle|show|hide)$/,
            tt = /queueHooks$/;
        function nt() {
            Ze && (!1 === i.hidden && e.requestAnimationFrame ? e.requestAnimationFrame(nt) : e.setTimeout(nt, w.fx.interval), w.fx.tick());
        }
        function it() {
            return (
                e.setTimeout(function () {
                    Je = void 0;
                }),
                    (Je = Date.now())
            );
        }
        function ot(e, t) {
            var n,
                i = 0,
                o = { height: e };
            for (t = t ? 1 : 0; i < 4; i += 2 - t) o["margin" + (n = ne[i])] = o["padding" + n] = e;
            return t && (o.opacity = o.width = e), o;
        }
        function st(e, t, n) {
            for (var i, o = (rt.tweeners[t] || []).concat(rt.tweeners["*"]), s = 0, r = o.length; s < r; s++) if ((i = o[s].call(n, t, e))) return i;
        }
        function rt(e, t, n) {
            var i,
                o,
                s = 0,
                r = rt.prefilters.length,
                a = w.Deferred().always(function () {
                    delete l.elem;
                }),
                l = function () {
                    if (o) return !1;
                    for (var t = Je || it(), n = Math.max(0, c.startTime + c.duration - t), i = 1 - (n / c.duration || 0), s = 0, r = c.tweens.length; s < r; s++) c.tweens[s].run(i);
                    return a.notifyWith(e, [c, i, n]), i < 1 && r ? n : (r || a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c]), !1);
                },
                c = a.promise({
                    elem: e,
                    props: w.extend({}, t),
                    opts: w.extend(!0, { specialEasing: {}, easing: w.easing._default }, n),
                    originalProperties: t,
                    originalOptions: n,
                    startTime: Je || it(),
                    duration: n.duration,
                    tweens: [],
                    createTween: function (t, n) {
                        var i = w.Tween(e, c.opts, t, n, c.opts.specialEasing[t] || c.opts.easing);
                        return c.tweens.push(i), i;
                    },
                    stop: function (t) {
                        var n = 0,
                            i = t ? c.tweens.length : 0;
                        if (o) return this;
                        for (o = !0; n < i; n++) c.tweens[n].run(1);
                        return t ? (a.notifyWith(e, [c, 1, 0]), a.resolveWith(e, [c, t])) : a.rejectWith(e, [c, t]), this;
                    },
                }),
                d = c.props;
            for (
                (function (e, t) {
                    var n, i, o, s, r;
                    for (n in e)
                        if (((o = t[(i = Q(n))]), (s = e[n]), Array.isArray(s) && ((o = s[1]), (s = e[n] = s[0])), n !== i && ((e[i] = s), delete e[n]), (r = w.cssHooks[i]) && ("expand" in r)))
                            for (n in ((s = r.expand(s)), delete e[i], s)) (n in e) || ((e[n] = s[n]), (t[n] = o));
                        else t[i] = o;
                })(d, c.opts.specialEasing);
                s < r;
                s++
            )
                if ((i = rt.prefilters[s].call(c, e, d, c.opts))) return m(i.stop) && (w._queueHooks(c.elem, c.opts.queue).stop = i.stop.bind(i)), i;
            return (
                w.map(d, st, c),
                m(c.opts.start) && c.opts.start.call(e, c),
                    c.progress(c.opts.progress).done(c.opts.done, c.opts.complete).fail(c.opts.fail).always(c.opts.always),
                    w.fx.timer(w.extend(l, { elem: e, anim: c, queue: c.opts.queue })),
                    c
            );
        }
        (w.Animation = w.extend(rt, {
            tweeners: {
                "*": [
                    function (e, t) {
                        var n = this.createTween(e, t);
                        return se(n.elem, e, te.exec(t), n), n;
                    },
                ],
            },
            tweener: function (e, t) {
                m(e) ? ((t = e), (e = ["*"])) : (e = e.match(j));
                for (var n, i = 0, o = e.length; i < o; i++) (n = e[i]), (rt.tweeners[n] = rt.tweeners[n] || []), rt.tweeners[n].unshift(t);
            },
            prefilters: [
                function (e, t, n) {
                    var i,
                        o,
                        s,
                        r,
                        a,
                        l,
                        c,
                        d,
                        u = "width" in t || "height" in t,
                        h = this,
                        p = {},
                        f = e.style,
                        m = e.nodeType && ie(e),
                        g = X.get(e, "fxshow");
                    for (i in (n.queue ||
                    (null == (r = w._queueHooks(e, "fx")).unqueued &&
                    ((r.unqueued = 0),
                        (a = r.empty.fire),
                        (r.empty.fire = function () {
                            r.unqueued || a();
                        })),
                        r.unqueued++,
                        h.always(function () {
                            h.always(function () {
                                r.unqueued--, w.queue(e, "fx").length || r.empty.fire();
                            });
                        })),
                        t))
                        if (((o = t[i]), et.test(o))) {
                            if ((delete t[i], (s = s || "toggle" === o), o === (m ? "hide" : "show"))) {
                                if ("show" !== o || !g || void 0 === g[i]) continue;
                                m = !0;
                            }
                            p[i] = (g && g[i]) || w.style(e, i);
                        }
                    if ((l = !w.isEmptyObject(t)) || !w.isEmptyObject(p))
                        for (i in (u &&
                        1 === e.nodeType &&
                        ((n.overflow = [f.overflow, f.overflowX, f.overflowY]),
                        null == (c = g && g.display) && (c = X.get(e, "display")),
                        "none" === (d = w.css(e, "display")) && (c ? (d = c) : (le([e], !0), (c = e.style.display || c), (d = w.css(e, "display")), le([e]))),
                        ("inline" === d || ("inline-block" === d && null != c)) &&
                        "none" === w.css(e, "float") &&
                        (l ||
                        (h.done(function () {
                            f.display = c;
                        }),
                        null == c && ((d = f.display), (c = "none" === d ? "" : d))),
                            (f.display = "inline-block"))),
                        n.overflow &&
                        ((f.overflow = "hidden"),
                            h.always(function () {
                                (f.overflow = n.overflow[0]), (f.overflowX = n.overflow[1]), (f.overflowY = n.overflow[2]);
                            })),
                            (l = !1),
                            p))
                            l ||
                            (g ? "hidden" in g && (m = g.hidden) : (g = X.access(e, "fxshow", { display: c })),
                            s && (g.hidden = !m),
                            m && le([e], !0),
                                h.done(function () {
                                    for (i in (m || le([e]), X.remove(e, "fxshow"), p)) w.style(e, i, p[i]);
                                })),
                                (l = st(m ? g[i] : 0, i, h)),
                            i in g || ((g[i] = l.start), m && ((l.end = l.start), (l.start = 0)));
                },
            ],
            prefilter: function (e, t) {
                t ? rt.prefilters.unshift(e) : rt.prefilters.push(e);
            },
        })),
            (w.speed = function (e, t, n) {
                var i = e && "object" == typeof e ? w.extend({}, e) : { complete: n || (!n && t) || (m(e) && e), duration: e, easing: (n && t) || (t && !m(t) && t) };
                return (
                    w.fx.off ? (i.duration = 0) : "number" != typeof i.duration && (i.duration in w.fx.speeds ? (i.duration = w.fx.speeds[i.duration]) : (i.duration = w.fx.speeds._default)),
                    (null != i.queue && !0 !== i.queue) || (i.queue = "fx"),
                        (i.old = i.complete),
                        (i.complete = function () {
                            m(i.old) && i.old.call(this), i.queue && w.dequeue(this, i.queue);
                        }),
                        i
                );
            }),
            w.fn.extend({
                fadeTo: function (e, t, n, i) {
                    return this.filter(ie).css("opacity", 0).show().end().animate({ opacity: t }, e, n, i);
                },
                animate: function (e, t, n, i) {
                    var o = w.isEmptyObject(e),
                        s = w.speed(t, n, i),
                        r = function () {
                            var t = rt(this, w.extend({}, e), s);
                            (o || X.get(this, "finish")) && t.stop(!0);
                        };
                    return (r.finish = r), o || !1 === s.queue ? this.each(r) : this.queue(s.queue, r);
                },
                stop: function (e, t, n) {
                    var i = function (e) {
                        var t = e.stop;
                        delete e.stop, t(n);
                    };
                    return (
                        "string" != typeof e && ((n = t), (t = e), (e = void 0)),
                        t && !1 !== e && this.queue(e || "fx", []),
                            this.each(function () {
                                var t = !0,
                                    o = null != e && e + "queueHooks",
                                    s = w.timers,
                                    r = X.get(this);
                                if (o) r[o] && r[o].stop && i(r[o]);
                                else for (o in r) r[o] && r[o].stop && tt.test(o) && i(r[o]);
                                for (o = s.length; o--; ) s[o].elem !== this || (null != e && s[o].queue !== e) || (s[o].anim.stop(n), (t = !1), s.splice(o, 1));
                                (!t && n) || w.dequeue(this, e);
                            })
                    );
                },
                finish: function (e) {
                    return (
                        !1 !== e && (e = e || "fx"),
                            this.each(function () {
                                var t,
                                    n = X.get(this),
                                    i = n[e + "queue"],
                                    o = n[e + "queueHooks"],
                                    s = w.timers,
                                    r = i ? i.length : 0;
                                for (n.finish = !0, w.queue(this, e, []), o && o.stop && o.stop.call(this, !0), t = s.length; t--; ) s[t].elem === this && s[t].queue === e && (s[t].anim.stop(!0), s.splice(t, 1));
                                for (t = 0; t < r; t++) i[t] && i[t].finish && i[t].finish.call(this);
                                delete n.finish;
                            })
                    );
                },
            }),
            w.each(["toggle", "show", "hide"], function (e, t) {
                var n = w.fn[t];
                w.fn[t] = function (e, i, o) {
                    return null == e || "boolean" == typeof e ? n.apply(this, arguments) : this.animate(ot(t, !0), e, i, o);
                };
            }),
            w.each({ slideDown: ot("show"), slideUp: ot("hide"), slideToggle: ot("toggle"), fadeIn: { opacity: "show" }, fadeOut: { opacity: "hide" }, fadeToggle: { opacity: "toggle" } }, function (e, t) {
                w.fn[e] = function (e, n, i) {
                    return this.animate(t, e, n, i);
                };
            }),
            (w.timers = []),
            (w.fx.tick = function () {
                var e,
                    t = 0,
                    n = w.timers;
                for (Je = Date.now(); t < n.length; t++) (e = n[t])() || n[t] !== e || n.splice(t--, 1);
                n.length || w.fx.stop(), (Je = void 0);
            }),
            (w.fx.timer = function (e) {
                w.timers.push(e), w.fx.start();
            }),
            (w.fx.interval = 13),
            (w.fx.start = function () {
                Ze || ((Ze = !0), nt());
            }),
            (w.fx.stop = function () {
                Ze = null;
            }),
            (w.fx.speeds = { slow: 600, fast: 200, _default: 400 }),
            (w.fn.delay = function (t, n) {
                return (
                    (t = (w.fx && w.fx.speeds[t]) || t),
                        (n = n || "fx"),
                        this.queue(n, function (n, i) {
                            var o = e.setTimeout(n, t);
                            i.stop = function () {
                                e.clearTimeout(o);
                            };
                        })
                );
            }),
            (function () {
                var e = i.createElement("input"),
                    t = i.createElement("select").appendChild(i.createElement("option"));
                (e.type = "checkbox"), (f.checkOn = "" !== e.value), (f.optSelected = t.selected), ((e = i.createElement("input")).value = "t"), (e.type = "radio"), (f.radioValue = "t" === e.value);
            })();
        var at,
            lt = w.expr.attrHandle;
        w.fn.extend({
            attr: function (e, t) {
                return R(this, w.attr, e, t, arguments.length > 1);
            },
            removeAttr: function (e) {
                return this.each(function () {
                    w.removeAttr(this, e);
                });
            },
        }),
            w.extend({
                attr: function (e, t, n) {
                    var i,
                        o,
                        s = e.nodeType;
                    if (3 !== s && 8 !== s && 2 !== s)
                        return void 0 === e.getAttribute
                            ? w.prop(e, t, n)
                            : ((1 === s && w.isXMLDoc(e)) || (o = w.attrHooks[t.toLowerCase()] || (w.expr.match.bool.test(t) ? at : void 0)),
                                void 0 !== n
                                    ? null === n
                                        ? void w.removeAttr(e, t)
                                        : o && "set" in o && void 0 !== (i = o.set(e, n, t))
                                            ? i
                                            : (e.setAttribute(t, n + ""), n)
                                    : o && "get" in o && null !== (i = o.get(e, t))
                                        ? i
                                        : null == (i = w.find.attr(e, t))
                                            ? void 0
                                            : i);
                },
                attrHooks: {
                    type: {
                        set: function (e, t) {
                            if (!f.radioValue && "radio" === t && C(e, "input")) {
                                var n = e.value;
                                return e.setAttribute("type", t), n && (e.value = n), t;
                            }
                        },
                    },
                },
                removeAttr: function (e, t) {
                    var n,
                        i = 0,
                        o = t && t.match(j);
                    if (o && 1 === e.nodeType) for (; (n = o[i++]); ) e.removeAttribute(n);
                },
            }),
            (at = {
                set: function (e, t, n) {
                    return !1 === t ? w.removeAttr(e, n) : e.setAttribute(n, n), n;
                },
            }),
            w.each(w.expr.match.bool.source.match(/\w+/g), function (e, t) {
                var n = lt[t] || w.find.attr;
                lt[t] = function (e, t, i) {
                    var o,
                        s,
                        r = t.toLowerCase();
                    return i || ((s = lt[r]), (lt[r] = o), (o = null != n(e, t, i) ? r : null), (lt[r] = s)), o;
                };
            });
        var ct = /^(?:input|select|textarea|button)$/i,
            dt = /^(?:a|area)$/i;
        function ut(e) {
            return (e.match(j) || []).join(" ");
        }
        function ht(e) {
            return (e.getAttribute && e.getAttribute("class")) || "";
        }
        function pt(e) {
            return Array.isArray(e) ? e : ("string" == typeof e && e.match(j)) || [];
        }
        w.fn.extend({
            prop: function (e, t) {
                return R(this, w.prop, e, t, arguments.length > 1);
            },
            removeProp: function (e) {
                return this.each(function () {
                    delete this[w.propFix[e] || e];
                });
            },
        }),
            w.extend({
                prop: function (e, t, n) {
                    var i,
                        o,
                        s = e.nodeType;
                    if (3 !== s && 8 !== s && 2 !== s)
                        return (
                            (1 === s && w.isXMLDoc(e)) || ((t = w.propFix[t] || t), (o = w.propHooks[t])),
                                void 0 !== n ? (o && "set" in o && void 0 !== (i = o.set(e, n, t)) ? i : (e[t] = n)) : o && "get" in o && null !== (i = o.get(e, t)) ? i : e[t]
                        );
                },
                propHooks: {
                    tabIndex: {
                        get: function (e) {
                            var t = w.find.attr(e, "tabindex");
                            return t ? parseInt(t, 10) : ct.test(e.nodeName) || (dt.test(e.nodeName) && e.href) ? 0 : -1;
                        },
                    },
                },
                propFix: { for: "htmlFor", class: "className" },
            }),
        f.optSelected ||
        (w.propHooks.selected = {
            get: function (e) {
                var t = e.parentNode;
                return t && t.parentNode && t.parentNode.selectedIndex, null;
            },
            set: function (e) {
                var t = e.parentNode;
                t && (t.selectedIndex, t.parentNode && t.parentNode.selectedIndex);
            },
        }),
            w.each(["tabIndex", "readOnly", "maxLength", "cellSpacing", "cellPadding", "rowSpan", "colSpan", "useMap", "frameBorder", "contentEditable"], function () {
                w.propFix[this.toLowerCase()] = this;
            }),
            w.fn.extend({
                addClass: function (e) {
                    var t,
                        n,
                        i,
                        o,
                        s,
                        r,
                        a,
                        l = 0;
                    if (m(e))
                        return this.each(function (t) {
                            w(this).addClass(e.call(this, t, ht(this)));
                        });
                    if ((t = pt(e)).length)
                        for (; (n = this[l++]); )
                            if (((o = ht(n)), (i = 1 === n.nodeType && " " + ut(o) + " "))) {
                                for (r = 0; (s = t[r++]); ) i.indexOf(" " + s + " ") < 0 && (i += s + " ");
                                o !== (a = ut(i)) && n.setAttribute("class", a);
                            }
                    return this;
                },
                removeClass: function (e) {
                    var t,
                        n,
                        i,
                        o,
                        s,
                        r,
                        a,
                        l = 0;
                    if (m(e))
                        return this.each(function (t) {
                            w(this).removeClass(e.call(this, t, ht(this)));
                        });
                    if (!arguments.length) return this.attr("class", "");
                    if ((t = pt(e)).length)
                        for (; (n = this[l++]); )
                            if (((o = ht(n)), (i = 1 === n.nodeType && " " + ut(o) + " "))) {
                                for (r = 0; (s = t[r++]); ) for (; i.indexOf(" " + s + " ") > -1; ) i = i.replace(" " + s + " ", " ");
                                o !== (a = ut(i)) && n.setAttribute("class", a);
                            }
                    return this;
                },
                toggleClass: function (e, t) {
                    var n = typeof e,
                        i = "string" === n || Array.isArray(e);
                    return "boolean" == typeof t && i
                        ? t
                            ? this.addClass(e)
                            : this.removeClass(e)
                        : m(e)
                            ? this.each(function (n) {
                                w(this).toggleClass(e.call(this, n, ht(this), t), t);
                            })
                            : this.each(function () {
                                var t, o, s, r;
                                if (i) for (o = 0, s = w(this), r = pt(e); (t = r[o++]); ) s.hasClass(t) ? s.removeClass(t) : s.addClass(t);
                                else (void 0 !== e && "boolean" !== n) || ((t = ht(this)) && X.set(this, "__className__", t), this.setAttribute && this.setAttribute("class", t || !1 === e ? "" : X.get(this, "__className__") || ""));
                            });
                },
                hasClass: function (e) {
                    var t,
                        n,
                        i = 0;
                    for (t = " " + e + " "; (n = this[i++]); ) if (1 === n.nodeType && (" " + ut(ht(n)) + " ").indexOf(t) > -1) return !0;
                    return !1;
                },
            });
        var ft = /\r/g;
        w.fn.extend({
            val: function (e) {
                var t,
                    n,
                    i,
                    o = this[0];
                return arguments.length
                    ? ((i = m(e)),
                        this.each(function (n) {
                            var o;
                            1 === this.nodeType &&
                            (null == (o = i ? e.call(this, n, w(this).val()) : e)
                                ? (o = "")
                                : "number" == typeof o
                                    ? (o += "")
                                    : Array.isArray(o) &&
                                    (o = w.map(o, function (e) {
                                        return null == e ? "" : e + "";
                                    })),
                            ((t = w.valHooks[this.type] || w.valHooks[this.nodeName.toLowerCase()]) && "set" in t && void 0 !== t.set(this, o, "value")) || (this.value = o));
                        }))
                    : o
                        ? (t = w.valHooks[o.type] || w.valHooks[o.nodeName.toLowerCase()]) && "get" in t && void 0 !== (n = t.get(o, "value"))
                            ? n
                            : "string" == typeof (n = o.value)
                                ? n.replace(ft, "")
                                : null == n
                                    ? ""
                                    : n
                        : void 0;
            },
        }),
            w.extend({
                valHooks: {
                    option: {
                        get: function (e) {
                            var t = w.find.attr(e, "value");
                            return null != t ? t : ut(w.text(e));
                        },
                    },
                    select: {
                        get: function (e) {
                            var t,
                                n,
                                i,
                                o = e.options,
                                s = e.selectedIndex,
                                r = "select-one" === e.type,
                                a = r ? null : [],
                                l = r ? s + 1 : o.length;
                            for (i = s < 0 ? l : r ? s : 0; i < l; i++)
                                if (((n = o[i]).selected || i === s) && !n.disabled && (!n.parentNode.disabled || !C(n.parentNode, "optgroup"))) {
                                    if (((t = w(n).val()), r)) return t;
                                    a.push(t);
                                }
                            return a;
                        },
                        set: function (e, t) {
                            for (var n, i, o = e.options, s = w.makeArray(t), r = o.length; r--; ) ((i = o[r]).selected = w.inArray(w.valHooks.option.get(i), s) > -1) && (n = !0);
                            return n || (e.selectedIndex = -1), s;
                        },
                    },
                },
            }),
            w.each(["radio", "checkbox"], function () {
                (w.valHooks[this] = {
                    set: function (e, t) {
                        if (Array.isArray(t)) return (e.checked = w.inArray(w(e).val(), t) > -1);
                    },
                }),
                f.checkOn ||
                (w.valHooks[this].get = function (e) {
                    return null === e.getAttribute("value") ? "on" : e.value;
                });
            }),
            (f.focusin = "onfocusin" in e);
        var mt = /^(?:focusinfocus|focusoutblur)$/,
            gt = function (e) {
                e.stopPropagation();
            };
        w.extend(w.event, {
            trigger: function (t, n, o, s) {
                var r,
                    a,
                    l,
                    c,
                    d,
                    h,
                    p,
                    f,
                    v = [o || i],
                    y = u.call(t, "type") ? t.type : t,
                    b = u.call(t, "namespace") ? t.namespace.split(".") : [];
                if (
                    ((a = f = l = o = o || i),
                    3 !== o.nodeType &&
                    8 !== o.nodeType &&
                    !mt.test(y + w.event.triggered) &&
                    (y.indexOf(".") > -1 && ((y = (b = y.split(".")).shift()), b.sort()),
                        (d = y.indexOf(":") < 0 && "on" + y),
                        ((t = t[w.expando] ? t : new w.Event(y, "object" == typeof t && t)).isTrigger = s ? 2 : 3),
                        (t.namespace = b.join(".")),
                        (t.rnamespace = t.namespace ? new RegExp("(^|\\.)" + b.join("\\.(?:.*\\.|)") + "(\\.|$)") : null),
                        (t.result = void 0),
                    t.target || (t.target = o),
                        (n = null == n ? [t] : w.makeArray(n, [t])),
                        (p = w.event.special[y] || {}),
                    s || !p.trigger || !1 !== p.trigger.apply(o, n)))
                ) {
                    if (!s && !p.noBubble && !g(o)) {
                        for (c = p.delegateType || y, mt.test(c + y) || (a = a.parentNode); a; a = a.parentNode) v.push(a), (l = a);
                        l === (o.ownerDocument || i) && v.push(l.defaultView || l.parentWindow || e);
                    }
                    for (r = 0; (a = v[r++]) && !t.isPropagationStopped(); )
                        (f = a),
                            (t.type = r > 1 ? c : p.bindType || y),
                        (h = (X.get(a, "events") || {})[t.type] && X.get(a, "handle")) && h.apply(a, n),
                        (h = d && a[d]) && h.apply && Y(a) && ((t.result = h.apply(a, n)), !1 === t.result && t.preventDefault());
                    return (
                        (t.type = y),
                        s ||
                        t.isDefaultPrevented() ||
                        (p._default && !1 !== p._default.apply(v.pop(), n)) ||
                        !Y(o) ||
                        (d &&
                            m(o[y]) &&
                            !g(o) &&
                            ((l = o[d]) && (o[d] = null),
                                (w.event.triggered = y),
                            t.isPropagationStopped() && f.addEventListener(y, gt),
                                o[y](),
                            t.isPropagationStopped() && f.removeEventListener(y, gt),
                                (w.event.triggered = void 0),
                            l && (o[d] = l))),
                            t.result
                    );
                }
            },
            simulate: function (e, t, n) {
                var i = w.extend(new w.Event(), n, { type: e, isSimulated: !0 });
                w.event.trigger(i, null, t);
            },
        }),
            w.fn.extend({
                trigger: function (e, t) {
                    return this.each(function () {
                        w.event.trigger(e, t, this);
                    });
                },
                triggerHandler: function (e, t) {
                    var n = this[0];
                    if (n) return w.event.trigger(e, t, n, !0);
                },
            }),
        f.focusin ||
        w.each({ focus: "focusin", blur: "focusout" }, function (e, t) {
            var n = function (e) {
                w.event.simulate(t, e.target, w.event.fix(e));
            };
            w.event.special[t] = {
                setup: function () {
                    var i = this.ownerDocument || this,
                        o = X.access(i, t);
                    o || i.addEventListener(e, n, !0), X.access(i, t, (o || 0) + 1);
                },
                teardown: function () {
                    var i = this.ownerDocument || this,
                        o = X.access(i, t) - 1;
                    o ? X.access(i, t, o) : (i.removeEventListener(e, n, !0), X.remove(i, t));
                },
            };
        });
        var vt = e.location,
            yt = Date.now(),
            bt = /\?/;
        w.parseXML = function (t) {
            var n;
            if (!t || "string" != typeof t) return null;
            try {
                n = new e.DOMParser().parseFromString(t, "text/xml");
            } catch (e) {
                n = void 0;
            }
            return (n && !n.getElementsByTagName("parsererror").length) || w.error("Invalid XML: " + t), n;
        };
        var wt = /\[\]$/,
            _t = /\r?\n/g,
            St = /^(?:submit|button|image|reset|file)$/i,
            xt = /^(?:input|select|textarea|keygen)/i;
        function Tt(e, t, n, i) {
            var o;
            if (Array.isArray(t))
                w.each(t, function (t, o) {
                    n || wt.test(e) ? i(e, o) : Tt(e + "[" + ("object" == typeof o && null != o ? t : "") + "]", o, n, i);
                });
            else if (n || "object" !== b(t)) i(e, t);
            else for (o in t) Tt(e + "[" + o + "]", t[o], n, i);
        }
        (w.param = function (e, t) {
            var n,
                i = [],
                o = function (e, t) {
                    var n = m(t) ? t() : t;
                    i[i.length] = encodeURIComponent(e) + "=" + encodeURIComponent(null == n ? "" : n);
                };
            if (Array.isArray(e) || (e.jquery && !w.isPlainObject(e)))
                w.each(e, function () {
                    o(this.name, this.value);
                });
            else for (n in e) Tt(n, e[n], t, o);
            return i.join("&");
        }),
            w.fn.extend({
                serialize: function () {
                    return w.param(this.serializeArray());
                },
                serializeArray: function () {
                    return this.map(function () {
                        var e = w.prop(this, "elements");
                        return e ? w.makeArray(e) : this;
                    })
                        .filter(function () {
                            var e = this.type;
                            return this.name && !w(this).is(":disabled") && xt.test(this.nodeName) && !St.test(e) && (this.checked || !ce.test(e));
                        })
                        .map(function (e, t) {
                            var n = w(this).val();
                            return null == n
                                ? null
                                : Array.isArray(n)
                                    ? w.map(n, function (e) {
                                        return { name: t.name, value: e.replace(_t, "\r\n") };
                                    })
                                    : { name: t.name, value: n.replace(_t, "\r\n") };
                        })
                        .get();
                },
            });
        var kt = /%20/g,
            Et = /#.*$/,
            Ct = /([?&])_=[^&]*/,
            At = /^(.*?):[ \t]*([^\r\n]*)$/gm,
            Lt = /^(?:GET|HEAD)$/,
            It = /^\/\//,
            Dt = {},
            Pt = {},
            Ot = "*/".concat("*"),
            Nt = i.createElement("a");
        function jt(e) {
            return function (t, n) {
                "string" != typeof t && ((n = t), (t = "*"));
                var i,
                    o = 0,
                    s = t.toLowerCase().match(j) || [];
                if (m(n)) for (; (i = s[o++]); ) "+" === i[0] ? ((i = i.slice(1) || "*"), (e[i] = e[i] || []).unshift(n)) : (e[i] = e[i] || []).push(n);
            };
        }
        function Ht(e, t, n, i) {
            var o = {},
                s = e === Pt;
            function r(a) {
                var l;
                return (
                    (o[a] = !0),
                        w.each(e[a] || [], function (e, a) {
                            var c = a(t, n, i);
                            return "string" != typeof c || s || o[c] ? (s ? !(l = c) : void 0) : (t.dataTypes.unshift(c), r(c), !1);
                        }),
                        l
                );
            }
            return r(t.dataTypes[0]) || (!o["*"] && r("*"));
        }
        function Mt(e, t) {
            var n,
                i,
                o = w.ajaxSettings.flatOptions || {};
            for (n in t) void 0 !== t[n] && ((o[n] ? e : i || (i = {}))[n] = t[n]);
            return i && w.extend(!0, e, i), e;
        }
        (Nt.href = vt.href),
            w.extend({
                active: 0,
                lastModified: {},
                etag: {},
                ajaxSettings: {
                    url: vt.href,
                    type: "GET",
                    isLocal: /^(?:about|app|app-storage|.+-extension|file|res|widget):$/.test(vt.protocol),
                    global: !0,
                    processData: !0,
                    async: !0,
                    contentType: "application/x-www-form-urlencoded; charset=UTF-8",
                    accepts: { "*": Ot, text: "text/plain", html: "text/html", xml: "application/xml, text/xml", json: "application/json, text/javascript" },
                    contents: { xml: /\bxml\b/, html: /\bhtml/, json: /\bjson\b/ },
                    responseFields: { xml: "responseXML", text: "responseText", json: "responseJSON" },
                    converters: { "* text": String, "text html": !0, "text json": JSON.parse, "text xml": w.parseXML },
                    flatOptions: { url: !0, context: !0 },
                },
                ajaxSetup: function (e, t) {
                    return t ? Mt(Mt(e, w.ajaxSettings), t) : Mt(w.ajaxSettings, e);
                },
                ajaxPrefilter: jt(Dt),
                ajaxTransport: jt(Pt),
                ajax: function (t, n) {
                    "object" == typeof t && ((n = t), (t = void 0)), (n = n || {});
                    var o,
                        s,
                        r,
                        a,
                        l,
                        c,
                        d,
                        u,
                        h,
                        p,
                        f = w.ajaxSetup({}, n),
                        m = f.context || f,
                        g = f.context && (m.nodeType || m.jquery) ? w(m) : w.event,
                        v = w.Deferred(),
                        y = w.Callbacks("once memory"),
                        b = f.statusCode || {},
                        _ = {},
                        S = {},
                        x = "canceled",
                        T = {
                            readyState: 0,
                            getResponseHeader: function (e) {
                                var t;
                                if (d) {
                                    if (!a) for (a = {}; (t = At.exec(r)); ) a[t[1].toLowerCase()] = t[2];
                                    t = a[e.toLowerCase()];
                                }
                                return null == t ? null : t;
                            },
                            getAllResponseHeaders: function () {
                                return d ? r : null;
                            },
                            setRequestHeader: function (e, t) {
                                return null == d && ((e = S[e.toLowerCase()] = S[e.toLowerCase()] || e), (_[e] = t)), this;
                            },
                            overrideMimeType: function (e) {
                                return null == d && (f.mimeType = e), this;
                            },
                            statusCode: function (e) {
                                var t;
                                if (e)
                                    if (d) T.always(e[T.status]);
                                    else for (t in e) b[t] = [b[t], e[t]];
                                return this;
                            },
                            abort: function (e) {
                                var t = e || x;
                                return o && o.abort(t), k(0, t), this;
                            },
                        };
                    if (
                        (v.promise(T),
                            (f.url = ((t || f.url || vt.href) + "").replace(It, vt.protocol + "//")),
                            (f.type = n.method || n.type || f.method || f.type),
                            (f.dataTypes = (f.dataType || "*").toLowerCase().match(j) || [""]),
                        null == f.crossDomain)
                    ) {
                        c = i.createElement("a");
                        try {
                            (c.href = f.url), (c.href = c.href), (f.crossDomain = Nt.protocol + "//" + Nt.host != c.protocol + "//" + c.host);
                        } catch (e) {
                            f.crossDomain = !0;
                        }
                    }
                    if ((f.data && f.processData && "string" != typeof f.data && (f.data = w.param(f.data, f.traditional)), Ht(Dt, f, n, T), d)) return T;
                    for (h in ((u = w.event && f.global) && 0 == w.active++ && w.event.trigger("ajaxStart"),
                        (f.type = f.type.toUpperCase()),
                        (f.hasContent = !Lt.test(f.type)),
                        (s = f.url.replace(Et, "")),
                        f.hasContent
                            ? f.data && f.processData && 0 === (f.contentType || "").indexOf("application/x-www-form-urlencoded") && (f.data = f.data.replace(kt, "+"))
                            : ((p = f.url.slice(s.length)),
                            f.data && (f.processData || "string" == typeof f.data) && ((s += (bt.test(s) ? "&" : "?") + f.data), delete f.data),
                            !1 === f.cache && ((s = s.replace(Ct, "$1")), (p = (bt.test(s) ? "&" : "?") + "_=" + yt++ + p)),
                                (f.url = s + p)),
                    f.ifModified && (w.lastModified[s] && T.setRequestHeader("If-Modified-Since", w.lastModified[s]), w.etag[s] && T.setRequestHeader("If-None-Match", w.etag[s])),
                    ((f.data && f.hasContent && !1 !== f.contentType) || n.contentType) && T.setRequestHeader("Content-Type", f.contentType),
                        T.setRequestHeader("Accept", f.dataTypes[0] && f.accepts[f.dataTypes[0]] ? f.accepts[f.dataTypes[0]] + ("*" !== f.dataTypes[0] ? ", " + Ot + "; q=0.01" : "") : f.accepts["*"]),
                        f.headers))
                        T.setRequestHeader(h, f.headers[h]);
                    if (f.beforeSend && (!1 === f.beforeSend.call(m, T, f) || d)) return T.abort();
                    if (((x = "abort"), y.add(f.complete), T.done(f.success), T.fail(f.error), (o = Ht(Pt, f, n, T)))) {
                        if (((T.readyState = 1), u && g.trigger("ajaxSend", [T, f]), d)) return T;
                        f.async &&
                        f.timeout > 0 &&
                        (l = e.setTimeout(function () {
                            T.abort("timeout");
                        }, f.timeout));
                        try {
                            (d = !1), o.send(_, k);
                        } catch (e) {
                            if (d) throw e;
                            k(-1, e);
                        }
                    } else k(-1, "No Transport");
                    function k(t, n, i, a) {
                        var c,
                            h,
                            p,
                            _,
                            S,
                            x = n;
                        d ||
                        ((d = !0),
                        l && e.clearTimeout(l),
                            (o = void 0),
                            (r = a || ""),
                            (T.readyState = t > 0 ? 4 : 0),
                            (c = (t >= 200 && t < 300) || 304 === t),
                        i &&
                        (_ = (function (e, t, n) {
                            for (var i, o, s, r, a = e.contents, l = e.dataTypes; "*" === l[0]; ) l.shift(), void 0 === i && (i = e.mimeType || t.getResponseHeader("Content-Type"));
                            if (i)
                                for (o in a)
                                    if (a[o] && a[o].test(i)) {
                                        l.unshift(o);
                                        break;
                                    }
                            if (l[0] in n) s = l[0];
                            else {
                                for (o in n) {
                                    if (!l[0] || e.converters[o + " " + l[0]]) {
                                        s = o;
                                        break;
                                    }
                                    r || (r = o);
                                }
                                s = s || r;
                            }
                            if (s) return s !== l[0] && l.unshift(s), n[s];
                        })(f, T, i)),
                            (_ = (function (e, t, n, i) {
                                var o,
                                    s,
                                    r,
                                    a,
                                    l,
                                    c = {},
                                    d = e.dataTypes.slice();
                                if (d[1]) for (r in e.converters) c[r.toLowerCase()] = e.converters[r];
                                for (s = d.shift(); s; )
                                    if ((e.responseFields[s] && (n[e.responseFields[s]] = t), !l && i && e.dataFilter && (t = e.dataFilter(t, e.dataType)), (l = s), (s = d.shift())))
                                        if ("*" === s) s = l;
                                        else if ("*" !== l && l !== s) {
                                            if (!(r = c[l + " " + s] || c["* " + s]))
                                                for (o in c)
                                                    if ((a = o.split(" "))[1] === s && (r = c[l + " " + a[0]] || c["* " + a[0]])) {
                                                        !0 === r ? (r = c[o]) : !0 !== c[o] && ((s = a[0]), d.unshift(a[1]));
                                                        break;
                                                    }
                                            if (!0 !== r)
                                                if (r && e.throws) t = r(t);
                                                else
                                                    try {
                                                        t = r(t);
                                                    } catch (e) {
                                                        return { state: "parsererror", error: r ? e : "No conversion from " + l + " to " + s };
                                                    }
                                        }
                                return { state: "success", data: t };
                            })(f, _, T, c)),
                            c
                                ? (f.ifModified && ((S = T.getResponseHeader("Last-Modified")) && (w.lastModified[s] = S), (S = T.getResponseHeader("etag")) && (w.etag[s] = S)),
                                    204 === t || "HEAD" === f.type ? (x = "nocontent") : 304 === t ? (x = "notmodified") : ((x = _.state), (h = _.data), (c = !(p = _.error))))
                                : ((p = x), (!t && x) || ((x = "error"), t < 0 && (t = 0))),
                            (T.status = t),
                            (T.statusText = (n || x) + ""),
                            c ? v.resolveWith(m, [h, x, T]) : v.rejectWith(m, [T, x, p]),
                            T.statusCode(b),
                            (b = void 0),
                        u && g.trigger(c ? "ajaxSuccess" : "ajaxError", [T, f, c ? h : p]),
                            y.fireWith(m, [T, x]),
                        u && (g.trigger("ajaxComplete", [T, f]), --w.active || w.event.trigger("ajaxStop")));
                    }
                    return T;
                },
                getJSON: function (e, t, n) {
                    return w.get(e, t, n, "json");
                },
                getScript: function (e, t) {
                    return w.get(e, void 0, t, "script");
                },
            }),
            w.each(["get", "post"], function (e, t) {
                w[t] = function (e, n, i, o) {
                    return m(n) && ((o = o || i), (i = n), (n = void 0)), w.ajax(w.extend({ url: e, type: t, dataType: o, data: n, success: i }, w.isPlainObject(e) && e));
                };
            }),
            (w._evalUrl = function (e) {
                return w.ajax({ url: e, type: "GET", dataType: "script", cache: !0, async: !1, global: !1, throws: !0 });
            }),
            w.fn.extend({
                wrapAll: function (e) {
                    var t;
                    return (
                        this[0] &&
                        (m(e) && (e = e.call(this[0])),
                            (t = w(e, this[0].ownerDocument).eq(0).clone(!0)),
                        this[0].parentNode && t.insertBefore(this[0]),
                            t
                                .map(function () {
                                    for (var e = this; e.firstElementChild; ) e = e.firstElementChild;
                                    return e;
                                })
                                .append(this)),
                            this
                    );
                },
                wrapInner: function (e) {
                    return m(e)
                        ? this.each(function (t) {
                            w(this).wrapInner(e.call(this, t));
                        })
                        : this.each(function () {
                            var t = w(this),
                                n = t.contents();
                            n.length ? n.wrapAll(e) : t.append(e);
                        });
                },
                wrap: function (e) {
                    var t = m(e);
                    return this.each(function (n) {
                        w(this).wrapAll(t ? e.call(this, n) : e);
                    });
                },
                unwrap: function (e) {
                    return (
                        this.parent(e)
                            .not("body")
                            .each(function () {
                                w(this).replaceWith(this.childNodes);
                            }),
                            this
                    );
                },
            }),
            (w.expr.pseudos.hidden = function (e) {
                return !w.expr.pseudos.visible(e);
            }),
            (w.expr.pseudos.visible = function (e) {
                return !!(e.offsetWidth || e.offsetHeight || e.getClientRects().length);
            }),
            (w.ajaxSettings.xhr = function () {
                try {
                    return new e.XMLHttpRequest();
                } catch (e) {}
            });
        var $t = { 0: 200, 1223: 204 },
            zt = w.ajaxSettings.xhr();
        (f.cors = !!zt && "withCredentials" in zt),
            (f.ajax = zt = !!zt),
            w.ajaxTransport(function (t) {
                var n, i;
                if (f.cors || (zt && !t.crossDomain))
                    return {
                        send: function (o, s) {
                            var r,
                                a = t.xhr();
                            if ((a.open(t.type, t.url, t.async, t.username, t.password), t.xhrFields)) for (r in t.xhrFields) a[r] = t.xhrFields[r];
                            for (r in (t.mimeType && a.overrideMimeType && a.overrideMimeType(t.mimeType), t.crossDomain || o["X-Requested-With"] || (o["X-Requested-With"] = "XMLHttpRequest"), o)) a.setRequestHeader(r, o[r]);
                            (n = function (e) {
                                return function () {
                                    n &&
                                    ((n = i = a.onload = a.onerror = a.onabort = a.ontimeout = a.onreadystatechange = null),
                                        "abort" === e
                                            ? a.abort()
                                            : "error" === e
                                                ? "number" != typeof a.status
                                                    ? s(0, "error")
                                                    : s(a.status, a.statusText)
                                                : s(
                                                    $t[a.status] || a.status,
                                                    a.statusText,
                                                    "text" !== (a.responseType || "text") || "string" != typeof a.responseText ? { binary: a.response } : { text: a.responseText },
                                                    a.getAllResponseHeaders()
                                                ));
                                };
                            }),
                                (a.onload = n()),
                                (i = a.onerror = a.ontimeout = n("error")),
                                void 0 !== a.onabort
                                    ? (a.onabort = i)
                                    : (a.onreadystatechange = function () {
                                        4 === a.readyState &&
                                        e.setTimeout(function () {
                                            n && i();
                                        });
                                    }),
                                (n = n("abort"));
                            try {
                                a.send((t.hasContent && t.data) || null);
                            } catch (e) {
                                if (n) throw e;
                            }
                        },
                        abort: function () {
                            n && n();
                        },
                    };
            }),
            w.ajaxPrefilter(function (e) {
                e.crossDomain && (e.contents.script = !1);
            }),
            w.ajaxSetup({
                accepts: { script: "text/javascript, application/javascript, application/ecmascript, application/x-ecmascript" },
                contents: { script: /\b(?:java|ecma)script\b/ },
                converters: {
                    "text script": function (e) {
                        return w.globalEval(e), e;
                    },
                },
            }),
            w.ajaxPrefilter("script", function (e) {
                void 0 === e.cache && (e.cache = !1), e.crossDomain && (e.type = "GET");
            }),
            w.ajaxTransport("script", function (e) {
                var t, n;
                if (e.crossDomain)
                    return {
                        send: function (o, s) {
                            (t = w("<script>")
                                .prop({ charset: e.scriptCharset, src: e.url })
                                .on(
                                    "load error",
                                    (n = function (e) {
                                        t.remove(), (n = null), e && s("error" === e.type ? 404 : 200, e.type);
                                    })
                                )),
                                i.head.appendChild(t[0]);
                        },
                        abort: function () {
                            n && n();
                        },
                    };
            });
        var qt = [],
            Wt = /(=)\?(?=&|$)|\?\?/;
        w.ajaxSetup({
            jsonp: "callback",
            jsonpCallback: function () {
                var e = qt.pop() || w.expando + "_" + yt++;
                return (this[e] = !0), e;
            },
        }),
            w.ajaxPrefilter("json jsonp", function (t, n, i) {
                var o,
                    s,
                    r,
                    a = !1 !== t.jsonp && (Wt.test(t.url) ? "url" : "string" == typeof t.data && 0 === (t.contentType || "").indexOf("application/x-www-form-urlencoded") && Wt.test(t.data) && "data");
                if (a || "jsonp" === t.dataTypes[0])
                    return (
                        (o = t.jsonpCallback = m(t.jsonpCallback) ? t.jsonpCallback() : t.jsonpCallback),
                            a ? (t[a] = t[a].replace(Wt, "$1" + o)) : !1 !== t.jsonp && (t.url += (bt.test(t.url) ? "&" : "?") + t.jsonp + "=" + o),
                            (t.converters["script json"] = function () {
                                return r || w.error(o + " was not called"), r[0];
                            }),
                            (t.dataTypes[0] = "json"),
                            (s = e[o]),
                            (e[o] = function () {
                                r = arguments;
                            }),
                            i.always(function () {
                                void 0 === s ? w(e).removeProp(o) : (e[o] = s), t[o] && ((t.jsonpCallback = n.jsonpCallback), qt.push(o)), r && m(s) && s(r[0]), (r = s = void 0);
                            }),
                            "script"
                    );
            }),
            (f.createHTMLDocument = (function () {
                var e = i.implementation.createHTMLDocument("").body;
                return (e.innerHTML = "<form></form><form></form>"), 2 === e.childNodes.length;
            })()),
            (w.parseHTML = function (e, t, n) {
                return "string" != typeof e
                    ? []
                    : ("boolean" == typeof t && ((n = t), (t = !1)),
                    t || (f.createHTMLDocument ? (((o = (t = i.implementation.createHTMLDocument("")).createElement("base")).href = i.location.href), t.head.appendChild(o)) : (t = i)),
                        (r = !n && []),
                        (s = A.exec(e)) ? [t.createElement(s[1])] : ((s = ge([e], t, r)), r && r.length && w(r).remove(), w.merge([], s.childNodes)));
                var o, s, r;
            }),
            (w.fn.load = function (e, t, n) {
                var i,
                    o,
                    s,
                    r = this,
                    a = e.indexOf(" ");
                return (
                    a > -1 && ((i = ut(e.slice(a))), (e = e.slice(0, a))),
                        m(t) ? ((n = t), (t = void 0)) : t && "object" == typeof t && (o = "POST"),
                    r.length > 0 &&
                    w
                        .ajax({ url: e, type: o || "GET", dataType: "html", data: t })
                        .done(function (e) {
                            (s = arguments), r.html(i ? w("<div>").append(w.parseHTML(e)).find(i) : e);
                        })
                        .always(
                            n &&
                            function (e, t) {
                                r.each(function () {
                                    n.apply(this, s || [e.responseText, t, e]);
                                });
                            }
                        ),
                        this
                );
            }),
            w.each(["ajaxStart", "ajaxStop", "ajaxComplete", "ajaxError", "ajaxSuccess", "ajaxSend"], function (e, t) {
                w.fn[t] = function (e) {
                    return this.on(t, e);
                };
            }),
            (w.expr.pseudos.animated = function (e) {
                return w.grep(w.timers, function (t) {
                    return e === t.elem;
                }).length;
            }),
            (w.offset = {
                setOffset: function (e, t, n) {
                    var i,
                        o,
                        s,
                        r,
                        a,
                        l,
                        c = w.css(e, "position"),
                        d = w(e),
                        u = {};
                    "static" === c && (e.style.position = "relative"),
                        (a = d.offset()),
                        (s = w.css(e, "top")),
                        (l = w.css(e, "left")),
                        ("absolute" === c || "fixed" === c) && (s + l).indexOf("auto") > -1 ? ((r = (i = d.position()).top), (o = i.left)) : ((r = parseFloat(s) || 0), (o = parseFloat(l) || 0)),
                    m(t) && (t = t.call(e, n, w.extend({}, a))),
                    null != t.top && (u.top = t.top - a.top + r),
                    null != t.left && (u.left = t.left - a.left + o),
                        "using" in t ? t.using.call(e, u) : d.css(u);
                },
            }),
            w.fn.extend({
                offset: function (e) {
                    if (arguments.length)
                        return void 0 === e
                            ? this
                            : this.each(function (t) {
                                w.offset.setOffset(this, e, t);
                            });
                    var t,
                        n,
                        i = this[0];
                    return i ? (i.getClientRects().length ? ((t = i.getBoundingClientRect()), (n = i.ownerDocument.defaultView), { top: t.top + n.pageYOffset, left: t.left + n.pageXOffset }) : { top: 0, left: 0 }) : void 0;
                },
                position: function () {
                    if (this[0]) {
                        var e,
                            t,
                            n,
                            i = this[0],
                            o = { top: 0, left: 0 };
                        if ("fixed" === w.css(i, "position")) t = i.getBoundingClientRect();
                        else {
                            for (t = this.offset(), n = i.ownerDocument, e = i.offsetParent || n.documentElement; e && (e === n.body || e === n.documentElement) && "static" === w.css(e, "position"); ) e = e.parentNode;
                            e && e !== i && 1 === e.nodeType && (((o = w(e).offset()).top += w.css(e, "borderTopWidth", !0)), (o.left += w.css(e, "borderLeftWidth", !0)));
                        }
                        return { top: t.top - o.top - w.css(i, "marginTop", !0), left: t.left - o.left - w.css(i, "marginLeft", !0) };
                    }
                },
                offsetParent: function () {
                    return this.map(function () {
                        for (var e = this.offsetParent; e && "static" === w.css(e, "position"); ) e = e.offsetParent;
                        return e || ve;
                    });
                },
            }),
            w.each({ scrollLeft: "pageXOffset", scrollTop: "pageYOffset" }, function (e, t) {
                var n = "pageYOffset" === t;
                w.fn[e] = function (i) {
                    return R(
                        this,
                        function (e, i, o) {
                            var s;
                            if ((g(e) ? (s = e) : 9 === e.nodeType && (s = e.defaultView), void 0 === o)) return s ? s[t] : e[i];
                            s ? s.scrollTo(n ? s.pageXOffset : o, n ? o : s.pageYOffset) : (e[i] = o);
                        },
                        e,
                        i,
                        arguments.length
                    );
                };
            }),
            w.each(["top", "left"], function (e, t) {
                w.cssHooks[t] = qe(f.pixelPosition, function (e, n) {
                    if (n) return (n = ze(e, t)), He.test(n) ? w(e).position()[t] + "px" : n;
                });
            }),
            w.each({ Height: "height", Width: "width" }, function (e, t) {
                w.each({ padding: "inner" + e, content: t, "": "outer" + e }, function (n, i) {
                    w.fn[i] = function (o, s) {
                        var r = arguments.length && (n || "boolean" != typeof o),
                            a = n || (!0 === o || !0 === s ? "margin" : "border");
                        return R(
                            this,
                            function (t, n, o) {
                                var s;
                                return g(t)
                                    ? 0 === i.indexOf("outer")
                                        ? t["inner" + e]
                                        : t.document.documentElement["client" + e]
                                    : 9 === t.nodeType
                                        ? ((s = t.documentElement), Math.max(t.body["scroll" + e], s["scroll" + e], t.body["offset" + e], s["offset" + e], s["client" + e]))
                                        : void 0 === o
                                            ? w.css(t, n, a)
                                            : w.style(t, n, o, a);
                            },
                            t,
                            r ? o : void 0,
                            r
                        );
                    };
                });
            }),
            w.each("blur focus focusin focusout resize scroll click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select submit keydown keypress keyup contextmenu".split(" "), function (e, t) {
                w.fn[t] = function (e, n) {
                    return arguments.length > 0 ? this.on(t, null, e, n) : this.trigger(t);
                };
            }),
            w.fn.extend({
                hover: function (e, t) {
                    return this.mouseenter(e).mouseleave(t || e);
                },
            }),
            w.fn.extend({
                bind: function (e, t, n) {
                    return this.on(e, null, t, n);
                },
                unbind: function (e, t) {
                    return this.off(e, null, t);
                },
                delegate: function (e, t, n, i) {
                    return this.on(t, e, n, i);
                },
                undelegate: function (e, t, n) {
                    return 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", n);
                },
            }),
            (w.proxy = function (e, t) {
                var n, i, o;
                if (("string" == typeof t && ((n = e[t]), (t = e), (e = n)), m(e)))
                    return (
                        (i = s.call(arguments, 2)),
                            ((o = function () {
                                return e.apply(t || this, i.concat(s.call(arguments)));
                            }).guid = e.guid = e.guid || w.guid++),
                            o
                    );
            }),
            (w.holdReady = function (e) {
                e ? w.readyWait++ : w.ready(!0);
            }),
            (w.isArray = Array.isArray),
            (w.parseJSON = JSON.parse),
            (w.nodeName = C),
            (w.isFunction = m),
            (w.isWindow = g),
            (w.camelCase = Q),
            (w.type = b),
            (w.now = Date.now),
            (w.isNumeric = function (e) {
                var t = w.type(e);
                return ("number" === t || "string" === t) && !isNaN(e - parseFloat(e));
            }),
        "function" == typeof define &&
        define.amd &&
        define("jquery", [], function () {
            return w;
        });
        var Rt = e.jQuery,
            Bt = e.$;
        return (
            (w.noConflict = function (t) {
                return e.$ === w && (e.$ = Bt), t && e.jQuery === w && (e.jQuery = Rt), w;
            }),
            t || (e.jQuery = e.$ = w),
                w
        );
    }),
void 0 === jQuery.migrateMute && (jQuery.migrateMute = !0),
    (function (e, t) {
        "use strict";
        function n(n) {
            var i = t.console;
            o[n] || ((o[n] = !0), e.migrateWarnings.push(n), i && i.warn && !e.migrateMute && (i.warn("JQMIGRATE: " + n), e.migrateTrace && i.trace && i.trace()));
        }
        function i(e, t, i, o) {
            Object.defineProperty(e, t, {
                configurable: !0,
                enumerable: !0,
                get: function () {
                    return n(o), i;
                },
            });
        }
        (e.migrateVersion = "3.0.0"),
            (function () {
                var n =
                    t.console &&
                    t.console.log &&
                    function () {
                        t.console.log.apply(t.console, arguments);
                    };
                n &&
                ((e && !/^[12]\./.test(e.fn.jquery)) || n("JQMIGRATE: jQuery 3.0.0+ REQUIRED"),
                e.migrateWarnings && n("JQMIGRATE: Migrate plugin loaded multiple times"),
                    n("JQMIGRATE: Migrate is installed" + (e.migrateMute ? "" : " with logging active") + ", version " + e.migrateVersion));
            })();
        var o = {};
        (e.migrateWarnings = []),
        void 0 === e.migrateTrace && (e.migrateTrace = !0),
            (e.migrateReset = function () {
                (o = {}), (e.migrateWarnings.length = 0);
            }),
        "BackCompat" === document.compatMode && n("jQuery is not compatible with Quirks Mode");
        var s,
            r = e.fn.init,
            a = e.isNumeric,
            l = e.find,
            c = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/,
            d = /\[(\s*[-\w]+\s*)([~|^$*]?=)\s*([-\w#]*?#[-\w#]*)\s*\]/g;
        for (s in ((e.fn.init = function (e) {
            var t = Array.prototype.slice.call(arguments);
            return "string" == typeof e && "#" === e && (n("jQuery( '#' ) is not a valid selector"), (t[0] = [])), r.apply(this, t);
        }),
            (e.fn.init.prototype = e.fn),
            (e.find = function (e) {
                var t = Array.prototype.slice.call(arguments);
                if ("string" == typeof e && c.test(e))
                    try {
                        document.querySelector(e);
                    } catch (i) {
                        e = e.replace(d, function (e, t, n, i) {
                            return "[" + t + n + '"' + i + '"]';
                        });
                        try {
                            document.querySelector(e), n("Attribute selector with '#' must be quoted: " + t[0]), (t[0] = e);
                        } catch (e) {
                            n("Attribute selector with '#' was not fixed: " + t[0]);
                        }
                    }
                return l.apply(this, t);
            }),
            l))
            Object.prototype.hasOwnProperty.call(l, s) && (e.find[s] = l[s]);
        (e.fn.size = function () {
            return n("jQuery.fn.size() is deprecated; use the .length property"), this.length;
        }),
            (e.parseJSON = function () {
                return n("jQuery.parseJSON is deprecated; use JSON.parse"), JSON.parse.apply(null, arguments);
            }),
            (e.isNumeric = function (t) {
                var i = a(t),
                    o = (function (t) {
                        var n = t && t.toString();
                        return !e.isArray(t) && n - parseFloat(n) + 1 >= 0;
                    })(t);
                return i !== o && n("jQuery.isNumeric() should not be called on constructed objects"), o;
            }),
            i(e, "unique", e.uniqueSort, "jQuery.unique is deprecated, use jQuery.uniqueSort"),
            i(e.expr, "filters", e.expr.pseudos, "jQuery.expr.filters is now jQuery.expr.pseudos"),
            i(e.expr, ":", e.expr.pseudos, 'jQuery.expr[":"] is now jQuery.expr.pseudos');
        var u = e.ajax;
        e.ajax = function () {
            var e = u.apply(this, arguments);
            return e.promise && (i(e, "success", e.done, "jQXHR.success is deprecated and removed"), i(e, "error", e.fail, "jQXHR.error is deprecated and removed"), i(e, "complete", e.always, "jQXHR.complete is deprecated and removed")), e;
        };
        var h = e.fn.removeAttr,
            p = e.fn.toggleClass,
            f = /\S+/g;
        (e.fn.removeAttr = function (t) {
            var i = this;
            return (
                e.each(t.match(f), function (t, o) {
                    e.expr.match.bool.test(o) && (n("jQuery.fn.removeAttr no longer sets boolean properties: " + o), i.prop(o, !1));
                }),
                    h.apply(this, arguments)
            );
        }),
            (e.fn.toggleClass = function (t) {
                return void 0 !== t && "boolean" != typeof t
                    ? p.apply(this, arguments)
                    : (n("jQuery.fn.toggleClass( boolean ) is deprecated"),
                        this.each(function () {
                            var n = (this.getAttribute && this.getAttribute("class")) || "";
                            n && e.data(this, "__className__", n), this.setAttribute && this.setAttribute("class", n || !1 === t ? "" : e.data(this, "__className__") || "");
                        }));
            });
        var m = !1;
        e.swap &&
        e.each(["height", "width", "reliableMarginRight"], function (t, n) {
            var i = e.cssHooks[n] && e.cssHooks[n].get;
            i &&
            (e.cssHooks[n].get = function () {
                var e;
                return (m = !0), (e = i.apply(this, arguments)), (m = !1), e;
            });
        }),
            (e.swap = function (e, t, i, o) {
                var s,
                    r,
                    a = {};
                for (r in (m || n("jQuery.swap() is undocumented and deprecated"), t)) (a[r] = e.style[r]), (e.style[r] = t[r]);
                for (r in ((s = i.apply(e, o || [])), t)) e.style[r] = a[r];
                return s;
            });
        var g = e.data;
        e.data = function (t, i, o) {
            var s;
            return i && i !== e.camelCase(i) && (s = e.hasData(t) && g.call(this, t)) && i in s ? (n("jQuery.data() always sets/gets camelCased names: " + i), arguments.length > 2 && (s[i] = o), s[i]) : g.apply(this, arguments);
        };
        var v = e.Tween.prototype.run;
        e.Tween.prototype.run = function (t) {
            e.easing[this.easing].length > 1 &&
            (n('easing function "jQuery.easing.' + this.easing.toString() + '" should use only first argument'), (e.easing[this.easing] = e.easing[this.easing].bind(e.easing, t, this.options.duration * t, 0, 1, this.options.duration))),
                v.apply(this, arguments);
        };
        var y = e.fn.load,
            b = e.event.fix;
        (e.event.props = []),
            (e.event.fixHooks = {}),
            (e.event.fix = function (t) {
                var i,
                    o = t.type,
                    s = this.fixHooks[o],
                    r = e.event.props;
                if (r.length) for (n("jQuery.event.props are deprecated and removed: " + r.join()); r.length; ) e.event.addProp(r.pop());
                if (s && !s._migrated_ && ((s._migrated_ = !0), n("jQuery.event.fixHooks are deprecated and removed: " + o), (r = s.props) && r.length)) for (; r.length; ) e.event.addProp(r.pop());
                return (i = b.call(this, t)), s && s.filter ? s.filter(i, t) : i;
            }),
            e.each(["load", "unload", "error"], function (t, i) {
                e.fn[i] = function () {
                    var e = Array.prototype.slice.call(arguments, 0);
                    return "load" === i && "string" == typeof e[0] ? y.apply(this, e) : (n("jQuery.fn." + i + "() is deprecated"), e.splice(0, 0, i), arguments.length ? this.on.apply(this, e) : (this.triggerHandler.apply(this, e), this));
                };
            }),
            e(function () {
                e(document).triggerHandler("ready");
            }),
            (e.event.special.ready = {
                setup: function () {
                    this === document && n("'ready' event is deprecated");
                },
            }),
            e.fn.extend({
                bind: function (e, t, i) {
                    return n("jQuery.fn.bind() is deprecated"), this.on(e, null, t, i);
                },
                unbind: function (e, t) {
                    return n("jQuery.fn.unbind() is deprecated"), this.off(e, null, t);
                },
                delegate: function (e, t, i, o) {
                    return n("jQuery.fn.delegate() is deprecated"), this.on(t, e, i, o);
                },
                undelegate: function (e, t, i) {
                    return n("jQuery.fn.undelegate() is deprecated"), 1 === arguments.length ? this.off(e, "**") : this.off(t, e || "**", i);
                },
            });
        var w = e.fn.offset;
        e.fn.offset = function () {
            var t,
                i = this[0],
                o = { top: 0, left: 0 };
            return i && i.nodeType
                ? ((t = (i.ownerDocument || document).documentElement), e.contains(t, i) ? w.apply(this, arguments) : (n("jQuery.fn.offset() requires an element connected to a document"), o))
                : (n("jQuery.fn.offset() requires a valid DOM element"), o);
        };
        var _ = e.param;
        e.param = function (t, i) {
            var o = e.ajaxSettings && e.ajaxSettings.traditional;
            return void 0 === i && o && (n("jQuery.param() no longer uses jQuery.ajaxSettings.traditional"), (i = o)), _.call(this, t, i);
        };
        var S = e.fn.andSelf || e.fn.addBack;
        e.fn.andSelf = function () {
            return n("jQuery.fn.andSelf() replaced by jQuery.fn.addBack()"), S.apply(this, arguments);
        };
        var x = e.Deferred,
            T = [
                ["resolve", "done", e.Callbacks("once memory"), e.Callbacks("once memory"), "resolved"],
                ["reject", "fail", e.Callbacks("once memory"), e.Callbacks("once memory"), "rejected"],
                ["notify", "progress", e.Callbacks("memory"), e.Callbacks("memory")],
            ];
        e.Deferred = function (t) {
            var i = x(),
                o = i.promise();
            return (
                (i.pipe = o.pipe = function () {
                    var t = arguments;
                    return (
                        n("deferred.pipe() is deprecated"),
                            e
                                .Deferred(function (n) {
                                    e.each(T, function (s, r) {
                                        var a = e.isFunction(t[s]) && t[s];
                                        i[r[1]](function () {
                                            var t = a && a.apply(this, arguments);
                                            t && e.isFunction(t.promise) ? t.promise().done(n.resolve).fail(n.reject).progress(n.notify) : n[r[0] + "With"](this === o ? n.promise() : this, a ? [t] : arguments);
                                        });
                                    }),
                                        (t = null);
                                })
                                .promise()
                    );
                }),
                t && t.call(i, i),
                    i
            );
        };
    })(jQuery, window),
    (function (e, t) {
        "object" == typeof exports && "undefined" != typeof module
            ? t(exports, require("jquery"), require("popper.js"))
            : "function" == typeof define && define.amd
                ? define(["exports", "jquery", "popper.js"], t)
                : t(((e = e || self).bootstrap = {}), e.jQuery, e.Popper);
    })(this, function (e, t, n) {
        "use strict";
        function i(e, t) {
            for (var n = 0; n < t.length; n++) {
                var i = t[n];
                (i.enumerable = i.enumerable || !1), (i.configurable = !0), "value" in i && (i.writable = !0), Object.defineProperty(e, i.key, i);
            }
        }
        function o(e, t, n) {
            return t && i(e.prototype, t), n && i(e, n), e;
        }
        function s(e) {
            for (var t = 1; t < arguments.length; t++) {
                var n = null != arguments[t] ? arguments[t] : {},
                    i = Object.keys(n);
                "function" == typeof Object.getOwnPropertySymbols &&
                (i = i.concat(
                    Object.getOwnPropertySymbols(n).filter(function (e) {
                        return Object.getOwnPropertyDescriptor(n, e).enumerable;
                    })
                )),
                    i.forEach(function (t) {
                        var i, o, s;
                        (i = e), (s = n[(o = t)]), o in i ? Object.defineProperty(i, o, { value: s, enumerable: !0, configurable: !0, writable: !0 }) : (i[o] = s);
                    });
            }
            return e;
        }
        (t = t && t.hasOwnProperty("default") ? t.default : t), (n = n && n.hasOwnProperty("default") ? n.default : n);
        var r = "transitionend";
        var a = {
            TRANSITION_END: "bsTransitionEnd",
            getUID: function (e) {
                for (; (e += ~~(1e6 * Math.random())), document.getElementById(e); );
                return e;
            },
            getSelectorFromElement: function (e) {
                var t = e.getAttribute("data-target");
                if (!t || "#" === t) {
                    var n = e.getAttribute("href");
                    t = n && "#" !== n ? n.trim() : "";
                }
                try {
                    return document.querySelector(t) ? t : null;
                } catch (e) {
                    return null;
                }
            },
            getTransitionDurationFromElement: function (e) {
                if (!e) return 0;
                var n = t(e).css("transition-duration"),
                    i = t(e).css("transition-delay"),
                    o = parseFloat(n),
                    s = parseFloat(i);
                return o || s ? ((n = n.split(",")[0]), (i = i.split(",")[0]), 1e3 * (parseFloat(n) + parseFloat(i))) : 0;
            },
            reflow: function (e) {
                return e.offsetHeight;
            },
            triggerTransitionEnd: function (e) {
                t(e).trigger(r);
            },
            supportsTransitionEnd: function () {
                return Boolean(r);
            },
            isElement: function (e) {
                return (e[0] || e).nodeType;
            },
            typeCheckConfig: function (e, t, n) {
                for (var i in n)
                    if (Object.prototype.hasOwnProperty.call(n, i)) {
                        var o = n[i],
                            s = t[i],
                            r =
                                s && a.isElement(s)
                                    ? "element"
                                    : ((l = s),
                                        {}.toString
                                            .call(l)
                                            .match(/\s([a-z]+)/i)[1]
                                            .toLowerCase());
                        if (!new RegExp(o).test(r)) throw new Error(e.toUpperCase() + ': Option "' + i + '" provided type "' + r + '" but expected type "' + o + '".');
                    }
                var l;
            },
            findShadowRoot: function (e) {
                if (!document.documentElement.attachShadow) return null;
                if ("function" != typeof e.getRootNode) return e instanceof ShadowRoot ? e : e.parentNode ? a.findShadowRoot(e.parentNode) : null;
                var t = e.getRootNode();
                return t instanceof ShadowRoot ? t : null;
            },
        };
        (t.fn.emulateTransitionEnd = function (e) {
            var n = this,
                i = !1;
            return (
                t(this).one(a.TRANSITION_END, function () {
                    i = !0;
                }),
                    setTimeout(function () {
                        i || a.triggerTransitionEnd(n);
                    }, e),
                    this
            );
        }),
            (t.event.special[a.TRANSITION_END] = {
                bindType: r,
                delegateType: r,
                handle: function (e) {
                    if (t(e.target).is(this)) return e.handleObj.handler.apply(this, arguments);
                },
            });
        var l = "alert",
            c = "bs.alert",
            d = "." + c,
            u = t.fn[l],
            h = { CLOSE: "close" + d, CLOSED: "closed" + d, CLICK_DATA_API: "click" + d + ".data-api" },
            p = (function () {
                function e(e) {
                    this._element = e;
                }
                var n = e.prototype;
                return (
                    (n.close = function (e) {
                        var t = this._element;
                        e && (t = this._getRootElement(e)), this._triggerCloseEvent(t).isDefaultPrevented() || this._removeElement(t);
                    }),
                        (n.dispose = function () {
                            t.removeData(this._element, c), (this._element = null);
                        }),
                        (n._getRootElement = function (e) {
                            var n = a.getSelectorFromElement(e),
                                i = !1;
                            return n && (i = document.querySelector(n)), i || (i = t(e).closest(".alert")[0]), i;
                        }),
                        (n._triggerCloseEvent = function (e) {
                            var n = t.Event(h.CLOSE);
                            return t(e).trigger(n), n;
                        }),
                        (n._removeElement = function (e) {
                            var n = this;
                            if ((t(e).removeClass("show"), t(e).hasClass("fade"))) {
                                var i = a.getTransitionDurationFromElement(e);
                                t(e)
                                    .one(a.TRANSITION_END, function (t) {
                                        return n._destroyElement(e, t);
                                    })
                                    .emulateTransitionEnd(i);
                            } else this._destroyElement(e);
                        }),
                        (n._destroyElement = function (e) {
                            t(e).detach().trigger(h.CLOSED).remove();
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this),
                                    o = i.data(c);
                                o || ((o = new e(this)), i.data(c, o)), "close" === n && o[n](this);
                            });
                        }),
                        (e._handleDismiss = function (e) {
                            return function (t) {
                                t && t.preventDefault(), e.close(this);
                            };
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document).on(h.CLICK_DATA_API, '[data-dismiss="alert"]', p._handleDismiss(new p())),
            (t.fn[l] = p._jQueryInterface),
            (t.fn[l].Constructor = p),
            (t.fn[l].noConflict = function () {
                return (t.fn[l] = u), p._jQueryInterface;
            });
        var f = "button",
            m = "bs.button",
            g = "." + m,
            v = ".data-api",
            y = t.fn[f],
            b = "active",
            w = '[data-toggle^="button"]',
            _ = ".btn",
            S = { CLICK_DATA_API: "click" + g + v, FOCUS_BLUR_DATA_API: "focus" + g + v + " blur" + g + v },
            x = (function () {
                function e(e) {
                    this._element = e;
                }
                var n = e.prototype;
                return (
                    (n.toggle = function () {
                        var e = !0,
                            n = !0,
                            i = t(this._element).closest('[data-toggle="buttons"]')[0];
                        if (i) {
                            var o = this._element.querySelector('input:not([type="hidden"])');
                            if (o) {
                                if ("radio" === o.type)
                                    if (o.checked && this._element.classList.contains(b)) e = !1;
                                    else {
                                        var s = i.querySelector(".active");
                                        s && t(s).removeClass(b);
                                    }
                                if (e) {
                                    if (o.hasAttribute("disabled") || i.hasAttribute("disabled") || o.classList.contains("disabled") || i.classList.contains("disabled")) return;
                                    (o.checked = !this._element.classList.contains(b)), t(o).trigger("change");
                                }
                                o.focus(), (n = !1);
                            }
                        }
                        n && this._element.setAttribute("aria-pressed", !this._element.classList.contains(b)), e && t(this._element).toggleClass(b);
                    }),
                        (n.dispose = function () {
                            t.removeData(this._element, m), (this._element = null);
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this).data(m);
                                i || ((i = new e(this)), t(this).data(m, i)), "toggle" === n && i[n]();
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document)
            .on(S.CLICK_DATA_API, w, function (e) {
                e.preventDefault();
                var n = e.target;
                t(n).hasClass("btn") || (n = t(n).closest(_)), x._jQueryInterface.call(t(n), "toggle");
            })
            .on(S.FOCUS_BLUR_DATA_API, w, function (e) {
                var n = t(e.target).closest(_)[0];
                t(n).toggleClass("focus", /^focus(in)?$/.test(e.type));
            }),
            (t.fn[f] = x._jQueryInterface),
            (t.fn[f].Constructor = x),
            (t.fn[f].noConflict = function () {
                return (t.fn[f] = y), x._jQueryInterface;
            });
        var T = "carousel",
            k = "bs.carousel",
            E = "." + k,
            C = ".data-api",
            A = t.fn[T],
            L = { interval: 5e3, keyboard: !0, slide: !1, pause: "hover", wrap: !0, touch: !0 },
            I = { interval: "(number|boolean)", keyboard: "boolean", slide: "(boolean|string)", pause: "(string|boolean)", wrap: "boolean", touch: "boolean" },
            D = "next",
            P = "prev",
            O = {
                SLIDE: "slide" + E,
                SLID: "slid" + E,
                KEYDOWN: "keydown" + E,
                MOUSEENTER: "mouseenter" + E,
                MOUSELEAVE: "mouseleave" + E,
                TOUCHSTART: "touchstart" + E,
                TOUCHMOVE: "touchmove" + E,
                TOUCHEND: "touchend" + E,
                POINTERDOWN: "pointerdown" + E,
                POINTERUP: "pointerup" + E,
                DRAG_START: "dragstart" + E,
                LOAD_DATA_API: "load" + E + C,
                CLICK_DATA_API: "click" + E + C,
            },
            N = "active",
            j = ".active.carousel-item",
            H = ".carousel-indicators",
            M = { TOUCH: "touch", PEN: "pen" },
            $ = (function () {
                function e(e, t) {
                    (this._items = null),
                        (this._interval = null),
                        (this._activeElement = null),
                        (this._isPaused = !1),
                        (this._isSliding = !1),
                        (this.touchTimeout = null),
                        (this.touchStartX = 0),
                        (this.touchDeltaX = 0),
                        (this._config = this._getConfig(t)),
                        (this._element = e),
                        (this._indicatorsElement = this._element.querySelector(H)),
                        (this._touchSupported = "ontouchstart" in document.documentElement || 0 < navigator.maxTouchPoints),
                        (this._pointerEvent = Boolean(window.PointerEvent || window.MSPointerEvent)),
                        this._addEventListeners();
                }
                var n = e.prototype;
                return (
                    (n.next = function () {
                        this._isSliding || this._slide(D);
                    }),
                        (n.nextWhenVisible = function () {
                            !document.hidden && t(this._element).is(":visible") && "hidden" !== t(this._element).css("visibility") && this.next();
                        }),
                        (n.prev = function () {
                            this._isSliding || this._slide(P);
                        }),
                        (n.pause = function (e) {
                            e || (this._isPaused = !0), this._element.querySelector(".carousel-item-next, .carousel-item-prev") && (a.triggerTransitionEnd(this._element), this.cycle(!0)), clearInterval(this._interval), (this._interval = null);
                        }),
                        (n.cycle = function (e) {
                            e || (this._isPaused = !1),
                            this._interval && (clearInterval(this._interval), (this._interval = null)),
                            this._config.interval && !this._isPaused && (this._interval = setInterval((document.visibilityState ? this.nextWhenVisible : this.next).bind(this), this._config.interval));
                        }),
                        (n.to = function (e) {
                            var n = this;
                            this._activeElement = this._element.querySelector(j);
                            var i = this._getItemIndex(this._activeElement);
                            if (!(e > this._items.length - 1 || e < 0))
                                if (this._isSliding)
                                    t(this._element).one(O.SLID, function () {
                                        return n.to(e);
                                    });
                                else {
                                    if (i === e) return this.pause(), void this.cycle();
                                    var o = i < e ? D : P;
                                    this._slide(o, this._items[e]);
                                }
                        }),
                        (n.dispose = function () {
                            t(this._element).off(E),
                                t.removeData(this._element, k),
                                (this._items = null),
                                (this._config = null),
                                (this._element = null),
                                (this._interval = null),
                                (this._isPaused = null),
                                (this._isSliding = null),
                                (this._activeElement = null),
                                (this._indicatorsElement = null);
                        }),
                        (n._getConfig = function (e) {
                            return (e = s({}, L, e)), a.typeCheckConfig(T, e, I), e;
                        }),
                        (n._handleSwipe = function () {
                            var e = Math.abs(this.touchDeltaX);
                            if (!(e <= 40)) {
                                var t = e / this.touchDeltaX;
                                0 < t && this.prev(), t < 0 && this.next();
                            }
                        }),
                        (n._addEventListeners = function () {
                            var e = this;
                            this._config.keyboard &&
                            t(this._element).on(O.KEYDOWN, function (t) {
                                return e._keydown(t);
                            }),
                            "hover" === this._config.pause &&
                            t(this._element)
                                .on(O.MOUSEENTER, function (t) {
                                    return e.pause(t);
                                })
                                .on(O.MOUSELEAVE, function (t) {
                                    return e.cycle(t);
                                }),
                            this._config.touch && this._addTouchEventListeners();
                        }),
                        (n._addTouchEventListeners = function () {
                            var e = this;
                            if (this._touchSupported) {
                                var n = function (t) {
                                        e._pointerEvent && M[t.originalEvent.pointerType.toUpperCase()] ? (e.touchStartX = t.originalEvent.clientX) : e._pointerEvent || (e.touchStartX = t.originalEvent.touches[0].clientX);
                                    },
                                    i = function (t) {
                                        e._pointerEvent && M[t.originalEvent.pointerType.toUpperCase()] && (e.touchDeltaX = t.originalEvent.clientX - e.touchStartX),
                                            e._handleSwipe(),
                                        "hover" === e._config.pause &&
                                        (e.pause(),
                                        e.touchTimeout && clearTimeout(e.touchTimeout),
                                            (e.touchTimeout = setTimeout(function (t) {
                                                return e.cycle(t);
                                            }, 500 + e._config.interval)));
                                    };
                                t(this._element.querySelectorAll(".carousel-item img")).on(O.DRAG_START, function (e) {
                                    return e.preventDefault();
                                }),
                                    this._pointerEvent
                                        ? (t(this._element).on(O.POINTERDOWN, function (e) {
                                            return n(e);
                                        }),
                                            t(this._element).on(O.POINTERUP, function (e) {
                                                return i(e);
                                            }),
                                            this._element.classList.add("pointer-event"))
                                        : (t(this._element).on(O.TOUCHSTART, function (e) {
                                            return n(e);
                                        }),
                                            t(this._element).on(O.TOUCHMOVE, function (t) {
                                                var n;
                                                (n = t).originalEvent.touches && 1 < n.originalEvent.touches.length ? (e.touchDeltaX = 0) : (e.touchDeltaX = n.originalEvent.touches[0].clientX - e.touchStartX);
                                            }),
                                            t(this._element).on(O.TOUCHEND, function (e) {
                                                return i(e);
                                            }));
                            }
                        }),
                        (n._keydown = function (e) {
                            if (!/input|textarea/i.test(e.target.tagName))
                                switch (e.which) {
                                    case 37:
                                        e.preventDefault(), this.prev();
                                        break;
                                    case 39:
                                        e.preventDefault(), this.next();
                                }
                        }),
                        (n._getItemIndex = function (e) {
                            return (this._items = e && e.parentNode ? [].slice.call(e.parentNode.querySelectorAll(".carousel-item")) : []), this._items.indexOf(e);
                        }),
                        (n._getItemByDirection = function (e, t) {
                            var n = e === D,
                                i = e === P,
                                o = this._getItemIndex(t),
                                s = this._items.length - 1;
                            if (((i && 0 === o) || (n && o === s)) && !this._config.wrap) return t;
                            var r = (o + (e === P ? -1 : 1)) % this._items.length;
                            return -1 === r ? this._items[this._items.length - 1] : this._items[r];
                        }),
                        (n._triggerSlideEvent = function (e, n) {
                            var i = this._getItemIndex(e),
                                o = this._getItemIndex(this._element.querySelector(j)),
                                s = t.Event(O.SLIDE, { relatedTarget: e, direction: n, from: o, to: i });
                            return t(this._element).trigger(s), s;
                        }),
                        (n._setActiveIndicatorElement = function (e) {
                            if (this._indicatorsElement) {
                                var n = [].slice.call(this._indicatorsElement.querySelectorAll(".active"));
                                t(n).removeClass(N);
                                var i = this._indicatorsElement.children[this._getItemIndex(e)];
                                i && t(i).addClass(N);
                            }
                        }),
                        (n._slide = function (e, n) {
                            var i,
                                o,
                                s,
                                r = this,
                                l = this._element.querySelector(j),
                                c = this._getItemIndex(l),
                                d = n || (l && this._getItemByDirection(e, l)),
                                u = this._getItemIndex(d),
                                h = Boolean(this._interval);
                            if (((s = e === D ? ((i = "carousel-item-left"), (o = "carousel-item-next"), "left") : ((i = "carousel-item-right"), (o = "carousel-item-prev"), "right")), d && t(d).hasClass(N))) this._isSliding = !1;
                            else if (!this._triggerSlideEvent(d, s).isDefaultPrevented() && l && d) {
                                (this._isSliding = !0), h && this.pause(), this._setActiveIndicatorElement(d);
                                var p = t.Event(O.SLID, { relatedTarget: d, direction: s, from: c, to: u });
                                if (t(this._element).hasClass("slide")) {
                                    t(d).addClass(o), a.reflow(d), t(l).addClass(i), t(d).addClass(i);
                                    var f = parseInt(d.getAttribute("data-interval"), 10);
                                    this._config.interval = f ? ((this._config.defaultInterval = this._config.defaultInterval || this._config.interval), f) : this._config.defaultInterval || this._config.interval;
                                    var m = a.getTransitionDurationFromElement(l);
                                    t(l)
                                        .one(a.TRANSITION_END, function () {
                                            t(d)
                                                .removeClass(i + " " + o)
                                                .addClass(N),
                                                t(l).removeClass(N + " " + o + " " + i),
                                                (r._isSliding = !1),
                                                setTimeout(function () {
                                                    return t(r._element).trigger(p);
                                                }, 0);
                                        })
                                        .emulateTransitionEnd(m);
                                } else t(l).removeClass(N), t(d).addClass(N), (this._isSliding = !1), t(this._element).trigger(p);
                                h && this.cycle();
                            }
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this).data(k),
                                    o = s({}, L, t(this).data());
                                "object" == typeof n && (o = s({}, o, n));
                                var r = "string" == typeof n ? n : o.slide;
                                if ((i || ((i = new e(this, o)), t(this).data(k, i)), "number" == typeof n)) i.to(n);
                                else if ("string" == typeof r) {
                                    if (void 0 === i[r]) throw new TypeError('No method named "' + r + '"');
                                    i[r]();
                                } else o.interval && o.ride && (i.pause(), i.cycle());
                            });
                        }),
                        (e._dataApiClickHandler = function (n) {
                            var i = a.getSelectorFromElement(this);
                            if (i) {
                                var o = t(i)[0];
                                if (o && t(o).hasClass("carousel")) {
                                    var r = s({}, t(o).data(), t(this).data()),
                                        l = this.getAttribute("data-slide-to");
                                    l && (r.interval = !1), e._jQueryInterface.call(t(o), r), l && t(o).data(k).to(l), n.preventDefault();
                                }
                            }
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return L;
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document).on(O.CLICK_DATA_API, "[data-slide], [data-slide-to]", $._dataApiClickHandler),
            t(window).on(O.LOAD_DATA_API, function () {
                for (var e = [].slice.call(document.querySelectorAll('[data-ride="carousel"]')), n = 0, i = e.length; n < i; n++) {
                    var o = t(e[n]);
                    $._jQueryInterface.call(o, o.data());
                }
            }),
            (t.fn[T] = $._jQueryInterface),
            (t.fn[T].Constructor = $),
            (t.fn[T].noConflict = function () {
                return (t.fn[T] = A), $._jQueryInterface;
            });
        var z = "collapse",
            q = "bs.collapse",
            W = "." + q,
            R = t.fn[z],
            B = { toggle: !0, parent: "" },
            F = { toggle: "boolean", parent: "(string|element)" },
            U = { SHOW: "show" + W, SHOWN: "shown" + W, HIDE: "hide" + W, HIDDEN: "hidden" + W, CLICK_DATA_API: "click" + W + ".data-api" },
            Q = "show",
            Y = "collapse",
            V = "collapsing",
            X = "collapsed",
            K = '[data-toggle="collapse"]',
            G = (function () {
                function e(e, t) {
                    (this._isTransitioning = !1),
                        (this._element = e),
                        (this._config = this._getConfig(t)),
                        (this._triggerArray = [].slice.call(document.querySelectorAll('[data-toggle="collapse"][href="#' + e.id + '"],[data-toggle="collapse"][data-target="#' + e.id + '"]')));
                    for (var n = [].slice.call(document.querySelectorAll(K)), i = 0, o = n.length; i < o; i++) {
                        var s = n[i],
                            r = a.getSelectorFromElement(s),
                            l = [].slice.call(document.querySelectorAll(r)).filter(function (t) {
                                return t === e;
                            });
                        null !== r && 0 < l.length && ((this._selector = r), this._triggerArray.push(s));
                    }
                    (this._parent = this._config.parent ? this._getParent() : null), this._config.parent || this._addAriaAndCollapsedClass(this._element, this._triggerArray), this._config.toggle && this.toggle();
                }
                var n = e.prototype;
                return (
                    (n.toggle = function () {
                        t(this._element).hasClass(Q) ? this.hide() : this.show();
                    }),
                        (n.show = function () {
                            var n,
                                i,
                                o = this;
                            if (
                                !(
                                    this._isTransitioning ||
                                    t(this._element).hasClass(Q) ||
                                    (this._parent &&
                                    0 ===
                                    (n = [].slice.call(this._parent.querySelectorAll(".show, .collapsing")).filter(function (e) {
                                        return "string" == typeof o._config.parent ? e.getAttribute("data-parent") === o._config.parent : e.classList.contains(Y);
                                    })).length &&
                                    (n = null),
                                    n && (i = t(n).not(this._selector).data(q)) && i._isTransitioning)
                                )
                            ) {
                                var s = t.Event(U.SHOW);
                                if ((t(this._element).trigger(s), !s.isDefaultPrevented())) {
                                    n && (e._jQueryInterface.call(t(n).not(this._selector), "hide"), i || t(n).data(q, null));
                                    var r = this._getDimension();
                                    t(this._element).removeClass(Y).addClass(V), (this._element.style[r] = 0), this._triggerArray.length && t(this._triggerArray).removeClass(X).attr("aria-expanded", !0), this.setTransitioning(!0);
                                    var l = "scroll" + (r[0].toUpperCase() + r.slice(1)),
                                        c = a.getTransitionDurationFromElement(this._element);
                                    t(this._element)
                                        .one(a.TRANSITION_END, function () {
                                            t(o._element).removeClass(V).addClass(Y).addClass(Q), (o._element.style[r] = ""), o.setTransitioning(!1), t(o._element).trigger(U.SHOWN);
                                        })
                                        .emulateTransitionEnd(c),
                                        (this._element.style[r] = this._element[l] + "px");
                                }
                            }
                        }),
                        (n.hide = function () {
                            var e = this;
                            if (!this._isTransitioning && t(this._element).hasClass(Q)) {
                                var n = t.Event(U.HIDE);
                                if ((t(this._element).trigger(n), !n.isDefaultPrevented())) {
                                    var i = this._getDimension();
                                    (this._element.style[i] = this._element.getBoundingClientRect()[i] + "px"), a.reflow(this._element), t(this._element).addClass(V).removeClass(Y).removeClass(Q);
                                    var o = this._triggerArray.length;
                                    if (0 < o)
                                        for (var s = 0; s < o; s++) {
                                            var r = this._triggerArray[s],
                                                l = a.getSelectorFromElement(r);
                                            null !== l && (t([].slice.call(document.querySelectorAll(l))).hasClass(Q) || t(r).addClass(X).attr("aria-expanded", !1));
                                        }
                                    this.setTransitioning(!0), (this._element.style[i] = "");
                                    var c = a.getTransitionDurationFromElement(this._element);
                                    t(this._element)
                                        .one(a.TRANSITION_END, function () {
                                            e.setTransitioning(!1), t(e._element).removeClass(V).addClass(Y).trigger(U.HIDDEN);
                                        })
                                        .emulateTransitionEnd(c);
                                }
                            }
                        }),
                        (n.setTransitioning = function (e) {
                            this._isTransitioning = e;
                        }),
                        (n.dispose = function () {
                            t.removeData(this._element, q), (this._config = null), (this._parent = null), (this._element = null), (this._triggerArray = null), (this._isTransitioning = null);
                        }),
                        (n._getConfig = function (e) {
                            return ((e = s({}, B, e)).toggle = Boolean(e.toggle)), a.typeCheckConfig(z, e, F), e;
                        }),
                        (n._getDimension = function () {
                            return t(this._element).hasClass("width") ? "width" : "height";
                        }),
                        (n._getParent = function () {
                            var n,
                                i = this;
                            a.isElement(this._config.parent) ? ((n = this._config.parent), void 0 !== this._config.parent.jquery && (n = this._config.parent[0])) : (n = document.querySelector(this._config.parent));
                            var o = '[data-toggle="collapse"][data-parent="' + this._config.parent + '"]',
                                s = [].slice.call(n.querySelectorAll(o));
                            return (
                                t(s).each(function (t, n) {
                                    i._addAriaAndCollapsedClass(e._getTargetFromElement(n), [n]);
                                }),
                                    n
                            );
                        }),
                        (n._addAriaAndCollapsedClass = function (e, n) {
                            var i = t(e).hasClass(Q);
                            n.length && t(n).toggleClass(X, !i).attr("aria-expanded", i);
                        }),
                        (e._getTargetFromElement = function (e) {
                            var t = a.getSelectorFromElement(e);
                            return t ? document.querySelector(t) : null;
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this),
                                    o = i.data(q),
                                    r = s({}, B, i.data(), "object" == typeof n && n ? n : {});
                                if ((!o && r.toggle && /show|hide/.test(n) && (r.toggle = !1), o || ((o = new e(this, r)), i.data(q, o)), "string" == typeof n)) {
                                    if (void 0 === o[n]) throw new TypeError('No method named "' + n + '"');
                                    o[n]();
                                }
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return B;
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document).on(U.CLICK_DATA_API, K, function (e) {
            "A" === e.currentTarget.tagName && e.preventDefault();
            var n = t(this),
                i = a.getSelectorFromElement(this),
                o = [].slice.call(document.querySelectorAll(i));
            t(o).each(function () {
                var e = t(this),
                    i = e.data(q) ? "toggle" : n.data();
                G._jQueryInterface.call(e, i);
            });
        }),
            (t.fn[z] = G._jQueryInterface),
            (t.fn[z].Constructor = G),
            (t.fn[z].noConflict = function () {
                return (t.fn[z] = R), G._jQueryInterface;
            });
        var J = "dropdown",
            Z = "bs.dropdown",
            ee = "." + Z,
            te = ".data-api",
            ne = t.fn[J],
            ie = new RegExp("38|40|27"),
            oe = { HIDE: "hide" + ee, HIDDEN: "hidden" + ee, SHOW: "show" + ee, SHOWN: "shown" + ee, CLICK: "click" + ee, CLICK_DATA_API: "click" + ee + te, KEYDOWN_DATA_API: "keydown" + ee + te, KEYUP_DATA_API: "keyup" + ee + te },
            se = "disabled",
            re = "show",
            ae = "dropdown-menu-right",
            le = '[data-toggle="dropdown"]',
            ce = ".dropdown-menu",
            de = { offset: 0, flip: !0, boundary: "scrollParent", reference: "toggle", display: "dynamic" },
            ue = { offset: "(number|string|function)", flip: "boolean", boundary: "(string|element)", reference: "(string|element)", display: "string" },
            he = (function () {
                function e(e, t) {
                    (this._element = e), (this._popper = null), (this._config = this._getConfig(t)), (this._menu = this._getMenuElement()), (this._inNavbar = this._detectNavbar()), this._addEventListeners();
                }
                var i = e.prototype;
                return (
                    (i.toggle = function () {
                        if (!this._element.disabled && !t(this._element).hasClass(se)) {
                            var i = e._getParentFromElement(this._element),
                                o = t(this._menu).hasClass(re);
                            if ((e._clearMenus(), !o)) {
                                var s = { relatedTarget: this._element },
                                    r = t.Event(oe.SHOW, s);
                                if ((t(i).trigger(r), !r.isDefaultPrevented())) {
                                    if (!this._inNavbar) {
                                        if (void 0 === n) throw new TypeError("Bootstrap's dropdowns require Popper.js (https://popper.js.org/)");
                                        var l = this._element;
                                        "parent" === this._config.reference ? (l = i) : a.isElement(this._config.reference) && ((l = this._config.reference), void 0 !== this._config.reference.jquery && (l = this._config.reference[0])),
                                        "scrollParent" !== this._config.boundary && t(i).addClass("position-static"),
                                            (this._popper = new n(l, this._menu, this._getPopperConfig()));
                                    }
                                    "ontouchstart" in document.documentElement && 0 === t(i).closest(".navbar-nav").length && t(document.body).children().on("mouseover", null, t.noop),
                                        this._element.focus(),
                                        this._element.setAttribute("aria-expanded", !0),
                                        t(this._menu).toggleClass(re),
                                        t(i).toggleClass(re).trigger(t.Event(oe.SHOWN, s));
                                }
                            }
                        }
                    }),
                        (i.show = function () {
                            if (!(this._element.disabled || t(this._element).hasClass(se) || t(this._menu).hasClass(re))) {
                                var n = { relatedTarget: this._element },
                                    i = t.Event(oe.SHOW, n),
                                    o = e._getParentFromElement(this._element);
                                t(o).trigger(i), i.isDefaultPrevented() || (t(this._menu).toggleClass(re), t(o).toggleClass(re).trigger(t.Event(oe.SHOWN, n)));
                            }
                        }),
                        (i.hide = function () {
                            if (!this._element.disabled && !t(this._element).hasClass(se) && t(this._menu).hasClass(re)) {
                                var n = { relatedTarget: this._element },
                                    i = t.Event(oe.HIDE, n),
                                    o = e._getParentFromElement(this._element);
                                t(o).trigger(i), i.isDefaultPrevented() || (t(this._menu).toggleClass(re), t(o).toggleClass(re).trigger(t.Event(oe.HIDDEN, n)));
                            }
                        }),
                        (i.dispose = function () {
                            t.removeData(this._element, Z), t(this._element).off(ee), (this._element = null), (this._menu = null) !== this._popper && (this._popper.destroy(), (this._popper = null));
                        }),
                        (i.update = function () {
                            (this._inNavbar = this._detectNavbar()), null !== this._popper && this._popper.scheduleUpdate();
                        }),
                        (i._addEventListeners = function () {
                            var e = this;
                            t(this._element).on(oe.CLICK, function (t) {
                                t.preventDefault(), t.stopPropagation(), e.toggle();
                            });
                        }),
                        (i._getConfig = function (e) {
                            return (e = s({}, this.constructor.Default, t(this._element).data(), e)), a.typeCheckConfig(J, e, this.constructor.DefaultType), e;
                        }),
                        (i._getMenuElement = function () {
                            if (!this._menu) {
                                var t = e._getParentFromElement(this._element);
                                t && (this._menu = t.querySelector(ce));
                            }
                            return this._menu;
                        }),
                        (i._getPlacement = function () {
                            var e = t(this._element.parentNode),
                                n = "bottom-start";
                            return (
                                e.hasClass("dropup")
                                    ? ((n = "top-start"), t(this._menu).hasClass(ae) && (n = "top-end"))
                                    : e.hasClass("dropright")
                                        ? (n = "right-start")
                                        : e.hasClass("dropleft")
                                            ? (n = "left-start")
                                            : t(this._menu).hasClass(ae) && (n = "bottom-end"),
                                    n
                            );
                        }),
                        (i._detectNavbar = function () {
                            return 0 < t(this._element).closest(".navbar").length;
                        }),
                        (i._getOffset = function () {
                            var e = this,
                                t = {};
                            return (
                                "function" == typeof this._config.offset
                                    ? (t.fn = function (t) {
                                        return (t.offsets = s({}, t.offsets, e._config.offset(t.offsets, e._element) || {})), t;
                                    })
                                    : (t.offset = this._config.offset),
                                    t
                            );
                        }),
                        (i._getPopperConfig = function () {
                            var e = { placement: this._getPlacement(), modifiers: { offset: this._getOffset(), flip: { enabled: this._config.flip }, preventOverflow: { boundariesElement: this._config.boundary } } };
                            return "static" === this._config.display && (e.modifiers.applyStyle = { enabled: !1 }), e;
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this).data(Z);
                                if ((i || ((i = new e(this, "object" == typeof n ? n : null)), t(this).data(Z, i)), "string" == typeof n)) {
                                    if (void 0 === i[n]) throw new TypeError('No method named "' + n + '"');
                                    i[n]();
                                }
                            });
                        }),
                        (e._clearMenus = function (n) {
                            if (!n || (3 !== n.which && ("keyup" !== n.type || 9 === n.which)))
                                for (var i = [].slice.call(document.querySelectorAll(le)), o = 0, s = i.length; o < s; o++) {
                                    var r = e._getParentFromElement(i[o]),
                                        a = t(i[o]).data(Z),
                                        l = { relatedTarget: i[o] };
                                    if ((n && "click" === n.type && (l.clickEvent = n), a)) {
                                        var c = a._menu;
                                        if (t(r).hasClass(re) && !(n && (("click" === n.type && /input|textarea/i.test(n.target.tagName)) || ("keyup" === n.type && 9 === n.which)) && t.contains(r, n.target))) {
                                            var d = t.Event(oe.HIDE, l);
                                            t(r).trigger(d),
                                            d.isDefaultPrevented() ||
                                            ("ontouchstart" in document.documentElement && t(document.body).children().off("mouseover", null, t.noop),
                                                i[o].setAttribute("aria-expanded", "false"),
                                                t(c).removeClass(re),
                                                t(r).removeClass(re).trigger(t.Event(oe.HIDDEN, l)));
                                        }
                                    }
                                }
                        }),
                        (e._getParentFromElement = function (e) {
                            var t,
                                n = a.getSelectorFromElement(e);
                            return n && (t = document.querySelector(n)), t || e.parentNode;
                        }),
                        (e._dataApiKeydownHandler = function (n) {
                            if (
                                (/input|textarea/i.test(n.target.tagName) ? !(32 === n.which || (27 !== n.which && ((40 !== n.which && 38 !== n.which) || t(n.target).closest(ce).length))) : ie.test(n.which)) &&
                                (n.preventDefault(), n.stopPropagation(), !this.disabled && !t(this).hasClass(se))
                            ) {
                                var i = e._getParentFromElement(this),
                                    o = t(i).hasClass(re);
                                if (o && (!o || (27 !== n.which && 32 !== n.which))) {
                                    var s = [].slice.call(i.querySelectorAll(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)"));
                                    if (0 !== s.length) {
                                        var r = s.indexOf(n.target);
                                        38 === n.which && 0 < r && r--, 40 === n.which && r < s.length - 1 && r++, r < 0 && (r = 0), s[r].focus();
                                    }
                                } else {
                                    if (27 === n.which) {
                                        var a = i.querySelector(le);
                                        t(a).trigger("focus");
                                    }
                                    t(this).trigger("click");
                                }
                            }
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return de;
                                },
                            },
                            {
                                key: "DefaultType",
                                get: function () {
                                    return ue;
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document)
            .on(oe.KEYDOWN_DATA_API, le, he._dataApiKeydownHandler)
            .on(oe.KEYDOWN_DATA_API, ce, he._dataApiKeydownHandler)
            .on(oe.CLICK_DATA_API + " " + oe.KEYUP_DATA_API, he._clearMenus)
            .on(oe.CLICK_DATA_API, le, function (e) {
                e.preventDefault(), e.stopPropagation(), he._jQueryInterface.call(t(this), "toggle");
            })
            .on(oe.CLICK_DATA_API, ".dropdown form", function (e) {
                e.stopPropagation();
            }),
            (t.fn[J] = he._jQueryInterface),
            (t.fn[J].Constructor = he),
            (t.fn[J].noConflict = function () {
                return (t.fn[J] = ne), he._jQueryInterface;
            });
        var pe = "modal",
            fe = "bs.modal",
            me = "." + fe,
            ge = t.fn[pe],
            ve = { backdrop: !0, keyboard: !0, focus: !0, show: !0 },
            ye = { backdrop: "(boolean|string)", keyboard: "boolean", focus: "boolean", show: "boolean" },
            be = {
                HIDE: "hide" + me,
                HIDDEN: "hidden" + me,
                SHOW: "show" + me,
                SHOWN: "shown" + me,
                FOCUSIN: "focusin" + me,
                RESIZE: "resize" + me,
                CLICK_DISMISS: "click.dismiss" + me,
                KEYDOWN_DISMISS: "keydown.dismiss" + me,
                MOUSEUP_DISMISS: "mouseup.dismiss" + me,
                MOUSEDOWN_DISMISS: "mousedown.dismiss" + me,
                CLICK_DATA_API: "click" + me + ".data-api",
            },
            we = "modal-open",
            _e = "fade",
            Se = "show",
            xe = ".modal-dialog",
            Te = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
            ke = ".sticky-top",
            Ee = (function () {
                function e(e, t) {
                    (this._config = this._getConfig(t)),
                        (this._element = e),
                        (this._dialog = e.querySelector(xe)),
                        (this._backdrop = null),
                        (this._isShown = !1),
                        (this._isBodyOverflowing = !1),
                        (this._ignoreBackdropClick = !1),
                        (this._isTransitioning = !1),
                        (this._scrollbarWidth = 0);
                }
                var n = e.prototype;
                return (
                    (n.toggle = function (e) {
                        return this._isShown ? this.hide() : this.show(e);
                    }),
                        (n.show = function (e) {
                            var n = this;
                            if (!this._isShown && !this._isTransitioning) {
                                t(this._element).hasClass(_e) && (this._isTransitioning = !0);
                                var i = t.Event(be.SHOW, { relatedTarget: e });
                                t(this._element).trigger(i),
                                this._isShown ||
                                i.isDefaultPrevented() ||
                                ((this._isShown = !0),
                                    this._checkScrollbar(),
                                    this._setScrollbar(),
                                    this._adjustDialog(),
                                    this._setEscapeEvent(),
                                    this._setResizeEvent(),
                                    t(this._element).on(be.CLICK_DISMISS, '[data-dismiss="modal"]', function (e) {
                                        return n.hide(e);
                                    }),
                                    t(this._dialog).on(be.MOUSEDOWN_DISMISS, function () {
                                        t(n._element).one(be.MOUSEUP_DISMISS, function (e) {
                                            t(e.target).is(n._element) && (n._ignoreBackdropClick = !0);
                                        });
                                    }),
                                    this._showBackdrop(function () {
                                        return n._showElement(e);
                                    }));
                            }
                        }),
                        (n.hide = function (e) {
                            var n = this;
                            if ((e && e.preventDefault(), this._isShown && !this._isTransitioning)) {
                                var i = t.Event(be.HIDE);
                                if ((t(this._element).trigger(i), this._isShown && !i.isDefaultPrevented())) {
                                    this._isShown = !1;
                                    var o = t(this._element).hasClass(_e);
                                    if (
                                        (o && (this._isTransitioning = !0),
                                            this._setEscapeEvent(),
                                            this._setResizeEvent(),
                                            t(document).off(be.FOCUSIN),
                                            t(this._element).removeClass(Se),
                                            t(this._element).off(be.CLICK_DISMISS),
                                            t(this._dialog).off(be.MOUSEDOWN_DISMISS),
                                            o)
                                    ) {
                                        var s = a.getTransitionDurationFromElement(this._element);
                                        t(this._element)
                                            .one(a.TRANSITION_END, function (e) {
                                                return n._hideModal(e);
                                            })
                                            .emulateTransitionEnd(s);
                                    } else this._hideModal();
                                }
                            }
                        }),
                        (n.dispose = function () {
                            [window, this._element, this._dialog].forEach(function (e) {
                                return t(e).off(me);
                            }),
                                t(document).off(be.FOCUSIN),
                                t.removeData(this._element, fe),
                                (this._config = null),
                                (this._element = null),
                                (this._dialog = null),
                                (this._backdrop = null),
                                (this._isShown = null),
                                (this._isBodyOverflowing = null),
                                (this._ignoreBackdropClick = null),
                                (this._isTransitioning = null),
                                (this._scrollbarWidth = null);
                        }),
                        (n.handleUpdate = function () {
                            this._adjustDialog();
                        }),
                        (n._getConfig = function (e) {
                            return (e = s({}, ve, e)), a.typeCheckConfig(pe, e, ye), e;
                        }),
                        (n._showElement = function (e) {
                            var n = this,
                                i = t(this._element).hasClass(_e);
                            (this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE) || document.body.appendChild(this._element),
                                (this._element.style.display = "block"),
                                this._element.removeAttribute("aria-hidden"),
                                this._element.setAttribute("aria-modal", !0),
                                t(this._dialog).hasClass("modal-dialog-scrollable") ? (this._dialog.querySelector(".modal-body").scrollTop = 0) : (this._element.scrollTop = 0),
                            i && a.reflow(this._element),
                                t(this._element).addClass(Se),
                            this._config.focus && this._enforceFocus();
                            var o = t.Event(be.SHOWN, { relatedTarget: e }),
                                s = function () {
                                    n._config.focus && n._element.focus(), (n._isTransitioning = !1), t(n._element).trigger(o);
                                };
                            if (i) {
                                var r = a.getTransitionDurationFromElement(this._dialog);
                                t(this._dialog).one(a.TRANSITION_END, s).emulateTransitionEnd(r);
                            } else s();
                        }),
                        (n._enforceFocus = function () {
                            var e = this;
                            t(document)
                                .off(be.FOCUSIN)
                                .on(be.FOCUSIN, function (n) {
                                    document !== n.target && e._element !== n.target && 0 === t(e._element).has(n.target).length && e._element.focus();
                                });
                        }),
                        (n._setEscapeEvent = function () {
                            var e = this;
                            this._isShown && this._config.keyboard
                                ? t(this._element).on(be.KEYDOWN_DISMISS, function (t) {
                                    27 === t.which && (t.preventDefault(), e.hide());
                                })
                                : this._isShown || t(this._element).off(be.KEYDOWN_DISMISS);
                        }),
                        (n._setResizeEvent = function () {
                            var e = this;
                            this._isShown
                                ? t(window).on(be.RESIZE, function (t) {
                                    return e.handleUpdate(t);
                                })
                                : t(window).off(be.RESIZE);
                        }),
                        (n._hideModal = function () {
                            var e = this;
                            (this._element.style.display = "none"),
                                this._element.setAttribute("aria-hidden", !0),
                                this._element.removeAttribute("aria-modal"),
                                (this._isTransitioning = !1),
                                this._showBackdrop(function () {
                                    t(document.body).removeClass(we), e._resetAdjustments(), e._resetScrollbar(), t(e._element).trigger(be.HIDDEN);
                                });
                        }),
                        (n._removeBackdrop = function () {
                            this._backdrop && (t(this._backdrop).remove(), (this._backdrop = null));
                        }),
                        (n._showBackdrop = function (e) {
                            var n = this,
                                i = t(this._element).hasClass(_e) ? _e : "";
                            if (this._isShown && this._config.backdrop) {
                                if (
                                    ((this._backdrop = document.createElement("div")),
                                        (this._backdrop.className = "modal-backdrop"),
                                    i && this._backdrop.classList.add(i),
                                        t(this._backdrop).appendTo(document.body),
                                        t(this._element).on(be.CLICK_DISMISS, function (e) {
                                            n._ignoreBackdropClick ? (n._ignoreBackdropClick = !1) : e.target === e.currentTarget && ("static" === n._config.backdrop ? n._element.focus() : n.hide());
                                        }),
                                    i && a.reflow(this._backdrop),
                                        t(this._backdrop).addClass(Se),
                                        !e)
                                )
                                    return;
                                if (!i) return void e();
                                var o = a.getTransitionDurationFromElement(this._backdrop);
                                t(this._backdrop).one(a.TRANSITION_END, e).emulateTransitionEnd(o);
                            } else if (!this._isShown && this._backdrop) {
                                t(this._backdrop).removeClass(Se);
                                var s = function () {
                                    n._removeBackdrop(), e && e();
                                };
                                if (t(this._element).hasClass(_e)) {
                                    var r = a.getTransitionDurationFromElement(this._backdrop);
                                    t(this._backdrop).one(a.TRANSITION_END, s).emulateTransitionEnd(r);
                                } else s();
                            } else e && e();
                        }),
                        (n._adjustDialog = function () {
                            var e = this._element.scrollHeight > document.documentElement.clientHeight;
                            !this._isBodyOverflowing && e && (this._element.style.paddingLeft = this._scrollbarWidth + "px"), this._isBodyOverflowing && !e && (this._element.style.paddingRight = this._scrollbarWidth + "px");
                        }),
                        (n._resetAdjustments = function () {
                            (this._element.style.paddingLeft = ""), (this._element.style.paddingRight = "");
                        }),
                        (n._checkScrollbar = function () {
                            var e = document.body.getBoundingClientRect();
                            (this._isBodyOverflowing = e.left + e.right < window.innerWidth), (this._scrollbarWidth = this._getScrollbarWidth());
                        }),
                        (n._setScrollbar = function () {
                            var e = this;
                            if (this._isBodyOverflowing) {
                                var n = [].slice.call(document.querySelectorAll(Te)),
                                    i = [].slice.call(document.querySelectorAll(ke));
                                t(n).each(function (n, i) {
                                    var o = i.style.paddingRight,
                                        s = t(i).css("padding-right");
                                    t(i)
                                        .data("padding-right", o)
                                        .css("padding-right", parseFloat(s) + e._scrollbarWidth + "px");
                                }),
                                    t(i).each(function (n, i) {
                                        var o = i.style.marginRight,
                                            s = t(i).css("margin-right");
                                        t(i)
                                            .data("margin-right", o)
                                            .css("margin-right", parseFloat(s) - e._scrollbarWidth + "px");
                                    });
                                var o = document.body.style.paddingRight,
                                    s = t(document.body).css("padding-right");
                                t(document.body)
                                    .data("padding-right", o)
                                    .css("padding-right", parseFloat(s) + this._scrollbarWidth + "px");
                            }
                            t(document.body).addClass(we);
                        }),
                        (n._resetScrollbar = function () {
                            var e = [].slice.call(document.querySelectorAll(Te));
                            t(e).each(function (e, n) {
                                var i = t(n).data("padding-right");
                                t(n).removeData("padding-right"), (n.style.paddingRight = i || "");
                            });
                            var n = [].slice.call(document.querySelectorAll("" + ke));
                            t(n).each(function (e, n) {
                                var i = t(n).data("margin-right");
                                void 0 !== i && t(n).css("margin-right", i).removeData("margin-right");
                            });
                            var i = t(document.body).data("padding-right");
                            t(document.body).removeData("padding-right"), (document.body.style.paddingRight = i || "");
                        }),
                        (n._getScrollbarWidth = function () {
                            var e = document.createElement("div");
                            (e.className = "modal-scrollbar-measure"), document.body.appendChild(e);
                            var t = e.getBoundingClientRect().width - e.clientWidth;
                            return document.body.removeChild(e), t;
                        }),
                        (e._jQueryInterface = function (n, i) {
                            return this.each(function () {
                                var o = t(this).data(fe),
                                    r = s({}, ve, t(this).data(), "object" == typeof n && n ? n : {});
                                if ((o || ((o = new e(this, r)), t(this).data(fe, o)), "string" == typeof n)) {
                                    if (void 0 === o[n]) throw new TypeError('No method named "' + n + '"');
                                    o[n](i);
                                } else r.show && o.show(i);
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return ve;
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document).on(be.CLICK_DATA_API, '[data-toggle="modal"]', function (e) {
            var n,
                i = this,
                o = a.getSelectorFromElement(this);
            o && (n = document.querySelector(o));
            var r = t(n).data(fe) ? "toggle" : s({}, t(n).data(), t(this).data());
            ("A" !== this.tagName && "AREA" !== this.tagName) || e.preventDefault();
            var l = t(n).one(be.SHOW, function (e) {
                e.isDefaultPrevented() ||
                l.one(be.HIDDEN, function () {
                    t(i).is(":visible") && i.focus();
                });
            });
            Ee._jQueryInterface.call(t(n), r, this);
        }),
            (t.fn[pe] = Ee._jQueryInterface),
            (t.fn[pe].Constructor = Ee),
            (t.fn[pe].noConflict = function () {
                return (t.fn[pe] = ge), Ee._jQueryInterface;
            });
        var Ce = ["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"],
            Ae = /^(?:(?:https?|mailto|ftp|tel|file):|[^&:\/?#]*(?:[\/?#]|$))/gi,
            Le = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[a-z0-9+\/]+=*$/i;
        function Ie(e, t, n) {
            if (0 === e.length) return e;
            if (n && "function" == typeof n) return n(e);
            for (
                var i = new window.DOMParser().parseFromString(e, "text/html"),
                    o = Object.keys(t),
                    s = [].slice.call(i.body.querySelectorAll("*")),
                    r = function (e, n) {
                        var i = s[e],
                            r = i.nodeName.toLowerCase();
                        if (-1 === o.indexOf(i.nodeName.toLowerCase())) return i.parentNode.removeChild(i), "continue";
                        var a = [].slice.call(i.attributes),
                            l = [].concat(t["*"] || [], t[r] || []);
                        a.forEach(function (e) {
                            (function (e, t) {
                                var n = e.nodeName.toLowerCase();
                                if (-1 !== t.indexOf(n)) return -1 === Ce.indexOf(n) || Boolean(e.nodeValue.match(Ae) || e.nodeValue.match(Le));
                                for (
                                    var i = t.filter(function (e) {
                                            return e instanceof RegExp;
                                        }),
                                        o = 0,
                                        s = i.length;
                                    o < s;
                                    o++
                                )
                                    if (n.match(i[o])) return !0;
                                return !1;
                            })(e, l) || i.removeAttribute(e.nodeName);
                        });
                    },
                    a = 0,
                    l = s.length;
                a < l;
                a++
            )
                r(a);
            return i.body.innerHTML;
        }
        var De = "tooltip",
            Pe = "bs.tooltip",
            Oe = "." + Pe,
            Ne = t.fn[De],
            je = "bs-tooltip",
            He = new RegExp("(^|\\s)" + je + "\\S+", "g"),
            Me = ["sanitize", "whiteList", "sanitizeFn"],
            $e = {
                animation: "boolean",
                template: "string",
                title: "(string|element|function)",
                trigger: "string",
                delay: "(number|object)",
                html: "boolean",
                selector: "(string|boolean)",
                placement: "(string|function)",
                offset: "(number|string|function)",
                container: "(string|element|boolean)",
                fallbackPlacement: "(string|array)",
                boundary: "(string|element)",
                sanitize: "boolean",
                sanitizeFn: "(null|function)",
                whiteList: "object",
            },
            ze = { AUTO: "auto", TOP: "top", RIGHT: "right", BOTTOM: "bottom", LEFT: "left" },
            qe = {
                animation: !0,
                template: '<div class="tooltip" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>',
                trigger: "hover focus",
                title: "",
                delay: 0,
                html: !1,
                selector: !1,
                placement: "top",
                offset: 0,
                container: !1,
                fallbackPlacement: "flip",
                boundary: "scrollParent",
                sanitize: !0,
                sanitizeFn: null,
                whiteList: {
                    "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
                    a: ["target", "href", "title", "rel"],
                    area: [],
                    b: [],
                    br: [],
                    col: [],
                    code: [],
                    div: [],
                    em: [],
                    hr: [],
                    h1: [],
                    h2: [],
                    h3: [],
                    h4: [],
                    h5: [],
                    h6: [],
                    i: [],
                    img: ["src", "alt", "title", "width", "height"],
                    li: [],
                    ol: [],
                    p: [],
                    pre: [],
                    s: [],
                    small: [],
                    span: [],
                    sub: [],
                    sup: [],
                    strong: [],
                    u: [],
                    ul: [],
                },
            },
            We = "show",
            Re = {
                HIDE: "hide" + Oe,
                HIDDEN: "hidden" + Oe,
                SHOW: "show" + Oe,
                SHOWN: "shown" + Oe,
                INSERTED: "inserted" + Oe,
                CLICK: "click" + Oe,
                FOCUSIN: "focusin" + Oe,
                FOCUSOUT: "focusout" + Oe,
                MOUSEENTER: "mouseenter" + Oe,
                MOUSELEAVE: "mouseleave" + Oe,
            },
            Be = "fade",
            Fe = "show",
            Ue = "hover",
            Qe = "focus",
            Ye = (function () {
                function e(e, t) {
                    if (void 0 === n) throw new TypeError("Bootstrap's tooltips require Popper.js (https://popper.js.org/)");
                    (this._isEnabled = !0), (this._timeout = 0), (this._hoverState = ""), (this._activeTrigger = {}), (this._popper = null), (this.element = e), (this.config = this._getConfig(t)), (this.tip = null), this._setListeners();
                }
                var i = e.prototype;
                return (
                    (i.enable = function () {
                        this._isEnabled = !0;
                    }),
                        (i.disable = function () {
                            this._isEnabled = !1;
                        }),
                        (i.toggleEnabled = function () {
                            this._isEnabled = !this._isEnabled;
                        }),
                        (i.toggle = function (e) {
                            if (this._isEnabled)
                                if (e) {
                                    var n = this.constructor.DATA_KEY,
                                        i = t(e.currentTarget).data(n);
                                    i || ((i = new this.constructor(e.currentTarget, this._getDelegateConfig())), t(e.currentTarget).data(n, i)),
                                        (i._activeTrigger.click = !i._activeTrigger.click),
                                        i._isWithActiveTrigger() ? i._enter(null, i) : i._leave(null, i);
                                } else {
                                    if (t(this.getTipElement()).hasClass(Fe)) return void this._leave(null, this);
                                    this._enter(null, this);
                                }
                        }),
                        (i.dispose = function () {
                            clearTimeout(this._timeout),
                                t.removeData(this.element, this.constructor.DATA_KEY),
                                t(this.element).off(this.constructor.EVENT_KEY),
                                t(this.element).closest(".modal").off("hide.bs.modal"),
                            this.tip && t(this.tip).remove(),
                                (this._isEnabled = null),
                                (this._timeout = null),
                                (this._hoverState = null),
                            (this._activeTrigger = null) !== this._popper && this._popper.destroy(),
                                (this._popper = null),
                                (this.element = null),
                                (this.config = null),
                                (this.tip = null);
                        }),
                        (i.show = function () {
                            var e = this;
                            if ("none" === t(this.element).css("display")) throw new Error("Please use show on visible elements");
                            var i = t.Event(this.constructor.Event.SHOW);
                            if (this.isWithContent() && this._isEnabled) {
                                t(this.element).trigger(i);
                                var o = a.findShadowRoot(this.element),
                                    s = t.contains(null !== o ? o : this.element.ownerDocument.documentElement, this.element);
                                if (i.isDefaultPrevented() || !s) return;
                                var r = this.getTipElement(),
                                    l = a.getUID(this.constructor.NAME);
                                r.setAttribute("id", l), this.element.setAttribute("aria-describedby", l), this.setContent(), this.config.animation && t(r).addClass(Be);
                                var c = "function" == typeof this.config.placement ? this.config.placement.call(this, r, this.element) : this.config.placement,
                                    d = this._getAttachment(c);
                                this.addAttachmentClass(d);
                                var u = this._getContainer();
                                t(r).data(this.constructor.DATA_KEY, this),
                                t.contains(this.element.ownerDocument.documentElement, this.tip) || t(r).appendTo(u),
                                    t(this.element).trigger(this.constructor.Event.INSERTED),
                                    (this._popper = new n(this.element, r, {
                                        placement: d,
                                        modifiers: { offset: this._getOffset(), flip: { behavior: this.config.fallbackPlacement }, arrow: { element: ".arrow" }, preventOverflow: { boundariesElement: this.config.boundary } },
                                        onCreate: function (t) {
                                            t.originalPlacement !== t.placement && e._handlePopperPlacementChange(t);
                                        },
                                        onUpdate: function (t) {
                                            return e._handlePopperPlacementChange(t);
                                        },
                                    })),
                                    t(r).addClass(Fe),
                                "ontouchstart" in document.documentElement && t(document.body).children().on("mouseover", null, t.noop);
                                var h = function () {
                                    e.config.animation && e._fixTransition();
                                    var n = e._hoverState;
                                    (e._hoverState = null), t(e.element).trigger(e.constructor.Event.SHOWN), "out" === n && e._leave(null, e);
                                };
                                if (t(this.tip).hasClass(Be)) {
                                    var p = a.getTransitionDurationFromElement(this.tip);
                                    t(this.tip).one(a.TRANSITION_END, h).emulateTransitionEnd(p);
                                } else h();
                            }
                        }),
                        (i.hide = function (e) {
                            var n = this,
                                i = this.getTipElement(),
                                o = t.Event(this.constructor.Event.HIDE),
                                s = function () {
                                    n._hoverState !== We && i.parentNode && i.parentNode.removeChild(i),
                                        n._cleanTipClass(),
                                        n.element.removeAttribute("aria-describedby"),
                                        t(n.element).trigger(n.constructor.Event.HIDDEN),
                                    null !== n._popper && n._popper.destroy(),
                                    e && e();
                                };
                            if ((t(this.element).trigger(o), !o.isDefaultPrevented())) {
                                if (
                                    (t(i).removeClass(Fe),
                                    "ontouchstart" in document.documentElement && t(document.body).children().off("mouseover", null, t.noop),
                                        (this._activeTrigger.click = !1),
                                        (this._activeTrigger[Qe] = !1),
                                        (this._activeTrigger[Ue] = !1),
                                        t(this.tip).hasClass(Be))
                                ) {
                                    var r = a.getTransitionDurationFromElement(i);
                                    t(i).one(a.TRANSITION_END, s).emulateTransitionEnd(r);
                                } else s();
                                this._hoverState = "";
                            }
                        }),
                        (i.update = function () {
                            null !== this._popper && this._popper.scheduleUpdate();
                        }),
                        (i.isWithContent = function () {
                            return Boolean(this.getTitle());
                        }),
                        (i.addAttachmentClass = function (e) {
                            t(this.getTipElement()).addClass(je + "-" + e);
                        }),
                        (i.getTipElement = function () {
                            return (this.tip = this.tip || t(this.config.template)[0]), this.tip;
                        }),
                        (i.setContent = function () {
                            var e = this.getTipElement();
                            this.setElementContent(t(e.querySelectorAll(".tooltip-inner")), this.getTitle()), t(e).removeClass(Be + " " + Fe);
                        }),
                        (i.setElementContent = function (e, n) {
                            "object" != typeof n || (!n.nodeType && !n.jquery)
                                ? this.config.html
                                    ? (this.config.sanitize && (n = Ie(n, this.config.whiteList, this.config.sanitizeFn)), e.html(n))
                                    : e.text(n)
                                : this.config.html
                                    ? t(n).parent().is(e) || e.empty().append(n)
                                    : e.text(t(n).text());
                        }),
                        (i.getTitle = function () {
                            var e = this.element.getAttribute("data-original-title");
                            return e || (e = "function" == typeof this.config.title ? this.config.title.call(this.element) : this.config.title), e;
                        }),
                        (i._getOffset = function () {
                            var e = this,
                                t = {};
                            return (
                                "function" == typeof this.config.offset
                                    ? (t.fn = function (t) {
                                        return (t.offsets = s({}, t.offsets, e.config.offset(t.offsets, e.element) || {})), t;
                                    })
                                    : (t.offset = this.config.offset),
                                    t
                            );
                        }),
                        (i._getContainer = function () {
                            return !1 === this.config.container ? document.body : a.isElement(this.config.container) ? t(this.config.container) : t(document).find(this.config.container);
                        }),
                        (i._getAttachment = function (e) {
                            return ze[e.toUpperCase()];
                        }),
                        (i._setListeners = function () {
                            var e = this;
                            this.config.trigger.split(" ").forEach(function (n) {
                                if ("click" === n)
                                    t(e.element).on(e.constructor.Event.CLICK, e.config.selector, function (t) {
                                        return e.toggle(t);
                                    });
                                else if ("manual" !== n) {
                                    var i = n === Ue ? e.constructor.Event.MOUSEENTER : e.constructor.Event.FOCUSIN,
                                        o = n === Ue ? e.constructor.Event.MOUSELEAVE : e.constructor.Event.FOCUSOUT;
                                    t(e.element)
                                        .on(i, e.config.selector, function (t) {
                                            return e._enter(t);
                                        })
                                        .on(o, e.config.selector, function (t) {
                                            return e._leave(t);
                                        });
                                }
                            }),
                                t(this.element)
                                    .closest(".modal")
                                    .on("hide.bs.modal", function () {
                                        e.element && e.hide();
                                    }),
                                this.config.selector ? (this.config = s({}, this.config, { trigger: "manual", selector: "" })) : this._fixTitle();
                        }),
                        (i._fixTitle = function () {
                            var e = typeof this.element.getAttribute("data-original-title");
                            (this.element.getAttribute("title") || "string" !== e) && (this.element.setAttribute("data-original-title", this.element.getAttribute("title") || ""), this.element.setAttribute("title", ""));
                        }),
                        (i._enter = function (e, n) {
                            var i = this.constructor.DATA_KEY;
                            (n = n || t(e.currentTarget).data(i)) || ((n = new this.constructor(e.currentTarget, this._getDelegateConfig())), t(e.currentTarget).data(i, n)),
                            e && (n._activeTrigger["focusin" === e.type ? Qe : Ue] = !0),
                                t(n.getTipElement()).hasClass(Fe) || n._hoverState === We
                                    ? (n._hoverState = We)
                                    : (clearTimeout(n._timeout),
                                        (n._hoverState = We),
                                        n.config.delay && n.config.delay.show
                                            ? (n._timeout = setTimeout(function () {
                                                n._hoverState === We && n.show();
                                            }, n.config.delay.show))
                                            : n.show());
                        }),
                        (i._leave = function (e, n) {
                            var i = this.constructor.DATA_KEY;
                            (n = n || t(e.currentTarget).data(i)) || ((n = new this.constructor(e.currentTarget, this._getDelegateConfig())), t(e.currentTarget).data(i, n)),
                            e && (n._activeTrigger["focusout" === e.type ? Qe : Ue] = !1),
                            n._isWithActiveTrigger() ||
                            (clearTimeout(n._timeout),
                                (n._hoverState = "out"),
                                n.config.delay && n.config.delay.hide
                                    ? (n._timeout = setTimeout(function () {
                                        "out" === n._hoverState && n.hide();
                                    }, n.config.delay.hide))
                                    : n.hide());
                        }),
                        (i._isWithActiveTrigger = function () {
                            for (var e in this._activeTrigger) if (this._activeTrigger[e]) return !0;
                            return !1;
                        }),
                        (i._getConfig = function (e) {
                            var n = t(this.element).data();
                            return (
                                Object.keys(n).forEach(function (e) {
                                    -1 !== Me.indexOf(e) && delete n[e];
                                }),
                                "number" == typeof (e = s({}, this.constructor.Default, n, "object" == typeof e && e ? e : {})).delay && (e.delay = { show: e.delay, hide: e.delay }),
                                "number" == typeof e.title && (e.title = e.title.toString()),
                                "number" == typeof e.content && (e.content = e.content.toString()),
                                    a.typeCheckConfig(De, e, this.constructor.DefaultType),
                                e.sanitize && (e.template = Ie(e.template, e.whiteList, e.sanitizeFn)),
                                    e
                            );
                        }),
                        (i._getDelegateConfig = function () {
                            var e = {};
                            if (this.config) for (var t in this.config) this.constructor.Default[t] !== this.config[t] && (e[t] = this.config[t]);
                            return e;
                        }),
                        (i._cleanTipClass = function () {
                            var e = t(this.getTipElement()),
                                n = e.attr("class").match(He);
                            null !== n && n.length && e.removeClass(n.join(""));
                        }),
                        (i._handlePopperPlacementChange = function (e) {
                            var t = e.instance;
                            (this.tip = t.popper), this._cleanTipClass(), this.addAttachmentClass(this._getAttachment(e.placement));
                        }),
                        (i._fixTransition = function () {
                            var e = this.getTipElement(),
                                n = this.config.animation;
                            null === e.getAttribute("x-placement") && (t(e).removeClass(Be), (this.config.animation = !1), this.hide(), this.show(), (this.config.animation = n));
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this).data(Pe),
                                    o = "object" == typeof n && n;
                                if ((i || !/dispose|hide/.test(n)) && (i || ((i = new e(this, o)), t(this).data(Pe, i)), "string" == typeof n)) {
                                    if (void 0 === i[n]) throw new TypeError('No method named "' + n + '"');
                                    i[n]();
                                }
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return qe;
                                },
                            },
                            {
                                key: "NAME",
                                get: function () {
                                    return De;
                                },
                            },
                            {
                                key: "DATA_KEY",
                                get: function () {
                                    return Pe;
                                },
                            },
                            {
                                key: "Event",
                                get: function () {
                                    return Re;
                                },
                            },
                            {
                                key: "EVENT_KEY",
                                get: function () {
                                    return Oe;
                                },
                            },
                            {
                                key: "DefaultType",
                                get: function () {
                                    return $e;
                                },
                            },
                        ]),
                        e
                );
            })();
        (t.fn[De] = Ye._jQueryInterface),
            (t.fn[De].Constructor = Ye),
            (t.fn[De].noConflict = function () {
                return (t.fn[De] = Ne), Ye._jQueryInterface;
            });
        var Ve = "popover",
            Xe = "bs.popover",
            Ke = "." + Xe,
            Ge = t.fn[Ve],
            Je = "bs-popover",
            Ze = new RegExp("(^|\\s)" + Je + "\\S+", "g"),
            et = s({}, Ye.Default, { placement: "right", trigger: "click", content: "", template: '<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>' }),
            tt = s({}, Ye.DefaultType, { content: "(string|element|function)" }),
            nt = {
                HIDE: "hide" + Ke,
                HIDDEN: "hidden" + Ke,
                SHOW: "show" + Ke,
                SHOWN: "shown" + Ke,
                INSERTED: "inserted" + Ke,
                CLICK: "click" + Ke,
                FOCUSIN: "focusin" + Ke,
                FOCUSOUT: "focusout" + Ke,
                MOUSEENTER: "mouseenter" + Ke,
                MOUSELEAVE: "mouseleave" + Ke,
            },
            it = (function (e) {
                var n, i;
                function s() {
                    return e.apply(this, arguments) || this;
                }
                (i = e), ((n = s).prototype = Object.create(i.prototype)), ((n.prototype.constructor = n).__proto__ = i);
                var r = s.prototype;
                return (
                    (r.isWithContent = function () {
                        return this.getTitle() || this._getContent();
                    }),
                        (r.addAttachmentClass = function (e) {
                            t(this.getTipElement()).addClass(Je + "-" + e);
                        }),
                        (r.getTipElement = function () {
                            return (this.tip = this.tip || t(this.config.template)[0]), this.tip;
                        }),
                        (r.setContent = function () {
                            var e = t(this.getTipElement());
                            this.setElementContent(e.find(".popover-header"), this.getTitle());
                            var n = this._getContent();
                            "function" == typeof n && (n = n.call(this.element)), this.setElementContent(e.find(".popover-body"), n), e.removeClass("fade show");
                        }),
                        (r._getContent = function () {
                            return this.element.getAttribute("data-content") || this.config.content;
                        }),
                        (r._cleanTipClass = function () {
                            var e = t(this.getTipElement()),
                                n = e.attr("class").match(Ze);
                            null !== n && 0 < n.length && e.removeClass(n.join(""));
                        }),
                        (s._jQueryInterface = function (e) {
                            return this.each(function () {
                                var n = t(this).data(Xe),
                                    i = "object" == typeof e ? e : null;
                                if ((n || !/dispose|hide/.test(e)) && (n || ((n = new s(this, i)), t(this).data(Xe, n)), "string" == typeof e)) {
                                    if (void 0 === n[e]) throw new TypeError('No method named "' + e + '"');
                                    n[e]();
                                }
                            });
                        }),
                        o(s, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return et;
                                },
                            },
                            {
                                key: "NAME",
                                get: function () {
                                    return Ve;
                                },
                            },
                            {
                                key: "DATA_KEY",
                                get: function () {
                                    return Xe;
                                },
                            },
                            {
                                key: "Event",
                                get: function () {
                                    return nt;
                                },
                            },
                            {
                                key: "EVENT_KEY",
                                get: function () {
                                    return Ke;
                                },
                            },
                            {
                                key: "DefaultType",
                                get: function () {
                                    return tt;
                                },
                            },
                        ]),
                        s
                );
            })(Ye);
        (t.fn[Ve] = it._jQueryInterface),
            (t.fn[Ve].Constructor = it),
            (t.fn[Ve].noConflict = function () {
                return (t.fn[Ve] = Ge), it._jQueryInterface;
            });
        var ot = "scrollspy",
            st = "bs.scrollspy",
            rt = "." + st,
            at = t.fn[ot],
            lt = { offset: 10, method: "auto", target: "" },
            ct = { offset: "number", method: "string", target: "(string|element)" },
            dt = { ACTIVATE: "activate" + rt, SCROLL: "scroll" + rt, LOAD_DATA_API: "load" + rt + ".data-api" },
            ut = "active",
            ht = ".nav, .list-group",
            pt = ".nav-link",
            ft = ".list-group-item",
            mt = ".dropdown-item",
            gt = "position",
            vt = (function () {
                function e(e, n) {
                    var i = this;
                    (this._element = e),
                        (this._scrollElement = "BODY" === e.tagName ? window : e),
                        (this._config = this._getConfig(n)),
                        (this._selector = this._config.target + " " + pt + "," + this._config.target + " " + ft + "," + this._config.target + " " + mt),
                        (this._offsets = []),
                        (this._targets = []),
                        (this._activeTarget = null),
                        (this._scrollHeight = 0),
                        t(this._scrollElement).on(dt.SCROLL, function (e) {
                            return i._process(e);
                        }),
                        this.refresh(),
                        this._process();
                }
                var n = e.prototype;
                return (
                    (n.refresh = function () {
                        var e = this,
                            n = this._scrollElement === this._scrollElement.window ? "offset" : gt,
                            i = "auto" === this._config.method ? n : this._config.method,
                            o = i === gt ? this._getScrollTop() : 0;
                        (this._offsets = []),
                            (this._targets = []),
                            (this._scrollHeight = this._getScrollHeight()),
                            [].slice
                                .call(document.querySelectorAll(this._selector))
                                .map(function (e) {
                                    var n,
                                        s = a.getSelectorFromElement(e);
                                    if ((s && (n = document.querySelector(s)), n)) {
                                        var r = n.getBoundingClientRect();
                                        if (r.width || r.height) return [t(n)[i]().top + o, s];
                                    }
                                    return null;
                                })
                                .filter(function (e) {
                                    return e;
                                })
                                .sort(function (e, t) {
                                    return e[0] - t[0];
                                })
                                .forEach(function (t) {
                                    e._offsets.push(t[0]), e._targets.push(t[1]);
                                });
                    }),
                        (n.dispose = function () {
                            t.removeData(this._element, st),
                                t(this._scrollElement).off(rt),
                                (this._element = null),
                                (this._scrollElement = null),
                                (this._config = null),
                                (this._selector = null),
                                (this._offsets = null),
                                (this._targets = null),
                                (this._activeTarget = null),
                                (this._scrollHeight = null);
                        }),
                        (n._getConfig = function (e) {
                            if ("string" != typeof (e = s({}, lt, "object" == typeof e && e ? e : {})).target) {
                                var n = t(e.target).attr("id");
                                n || ((n = a.getUID(ot)), t(e.target).attr("id", n)), (e.target = "#" + n);
                            }
                            return a.typeCheckConfig(ot, e, ct), e;
                        }),
                        (n._getScrollTop = function () {
                            return this._scrollElement === window ? this._scrollElement.pageYOffset : this._scrollElement.scrollTop;
                        }),
                        (n._getScrollHeight = function () {
                            return this._scrollElement.scrollHeight || Math.max(document.body.scrollHeight, document.documentElement.scrollHeight);
                        }),
                        (n._getOffsetHeight = function () {
                            return this._scrollElement === window ? window.innerHeight : this._scrollElement.getBoundingClientRect().height;
                        }),
                        (n._process = function () {
                            var e = this._getScrollTop() + this._config.offset,
                                t = this._getScrollHeight(),
                                n = this._config.offset + t - this._getOffsetHeight();
                            if ((this._scrollHeight !== t && this.refresh(), n <= e)) {
                                var i = this._targets[this._targets.length - 1];
                                this._activeTarget !== i && this._activate(i);
                            } else {
                                if (this._activeTarget && e < this._offsets[0] && 0 < this._offsets[0]) return (this._activeTarget = null), void this._clear();
                                for (var o = this._offsets.length; o--; ) this._activeTarget !== this._targets[o] && e >= this._offsets[o] && (void 0 === this._offsets[o + 1] || e < this._offsets[o + 1]) && this._activate(this._targets[o]);
                            }
                        }),
                        (n._activate = function (e) {
                            (this._activeTarget = e), this._clear();
                            var n = this._selector.split(",").map(function (t) {
                                    return t + '[data-target="' + e + '"],' + t + '[href="' + e + '"]';
                                }),
                                i = t([].slice.call(document.querySelectorAll(n.join(","))));
                            i.hasClass("dropdown-item")
                                ? (i.closest(".dropdown").find(".dropdown-toggle").addClass(ut), i.addClass(ut))
                                : (i.addClass(ut),
                                    i
                                        .parents(ht)
                                        .prev(pt + ", " + ft)
                                        .addClass(ut),
                                    i.parents(ht).prev(".nav-item").children(pt).addClass(ut)),
                                t(this._scrollElement).trigger(dt.ACTIVATE, { relatedTarget: e });
                        }),
                        (n._clear = function () {
                            [].slice
                                .call(document.querySelectorAll(this._selector))
                                .filter(function (e) {
                                    return e.classList.contains(ut);
                                })
                                .forEach(function (e) {
                                    return e.classList.remove(ut);
                                });
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this).data(st);
                                if ((i || ((i = new e(this, "object" == typeof n && n)), t(this).data(st, i)), "string" == typeof n)) {
                                    if (void 0 === i[n]) throw new TypeError('No method named "' + n + '"');
                                    i[n]();
                                }
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return lt;
                                },
                            },
                        ]),
                        e
                );
            })();
        t(window).on(dt.LOAD_DATA_API, function () {
            for (var e = [].slice.call(document.querySelectorAll('[data-spy="scroll"]')), n = e.length; n--; ) {
                var i = t(e[n]);
                vt._jQueryInterface.call(i, i.data());
            }
        }),
            (t.fn[ot] = vt._jQueryInterface),
            (t.fn[ot].Constructor = vt),
            (t.fn[ot].noConflict = function () {
                return (t.fn[ot] = at), vt._jQueryInterface;
            });
        var yt = "bs.tab",
            bt = "." + yt,
            wt = t.fn.tab,
            _t = { HIDE: "hide" + bt, HIDDEN: "hidden" + bt, SHOW: "show" + bt, SHOWN: "shown" + bt, CLICK_DATA_API: "click" + bt + ".data-api" },
            St = "active",
            xt = ".active",
            Tt = "> li > .active",
            kt = (function () {
                function e(e) {
                    this._element = e;
                }
                var n = e.prototype;
                return (
                    (n.show = function () {
                        var e = this;
                        if (!((this._element.parentNode && this._element.parentNode.nodeType === Node.ELEMENT_NODE && t(this._element).hasClass(St)) || t(this._element).hasClass("disabled"))) {
                            var n,
                                i,
                                o = t(this._element).closest(".nav, .list-group")[0],
                                s = a.getSelectorFromElement(this._element);
                            if (o) {
                                var r = "UL" === o.nodeName || "OL" === o.nodeName ? Tt : xt;
                                i = (i = t.makeArray(t(o).find(r)))[i.length - 1];
                            }
                            var l = t.Event(_t.HIDE, { relatedTarget: this._element }),
                                c = t.Event(_t.SHOW, { relatedTarget: i });
                            if ((i && t(i).trigger(l), t(this._element).trigger(c), !c.isDefaultPrevented() && !l.isDefaultPrevented())) {
                                s && (n = document.querySelector(s)), this._activate(this._element, o);
                                var d = function () {
                                    var n = t.Event(_t.HIDDEN, { relatedTarget: e._element }),
                                        o = t.Event(_t.SHOWN, { relatedTarget: i });
                                    t(i).trigger(n), t(e._element).trigger(o);
                                };
                                n ? this._activate(n, n.parentNode, d) : d();
                            }
                        }
                    }),
                        (n.dispose = function () {
                            t.removeData(this._element, yt), (this._element = null);
                        }),
                        (n._activate = function (e, n, i) {
                            var o = this,
                                s = (!n || ("UL" !== n.nodeName && "OL" !== n.nodeName) ? t(n).children(xt) : t(n).find(Tt))[0],
                                r = i && s && t(s).hasClass("fade"),
                                l = function () {
                                    return o._transitionComplete(e, s, i);
                                };
                            if (s && r) {
                                var c = a.getTransitionDurationFromElement(s);
                                t(s).removeClass("show").one(a.TRANSITION_END, l).emulateTransitionEnd(c);
                            } else l();
                        }),
                        (n._transitionComplete = function (e, n, i) {
                            if (n) {
                                t(n).removeClass(St);
                                var o = t(n.parentNode).find("> .dropdown-menu .active")[0];
                                o && t(o).removeClass(St), "tab" === n.getAttribute("role") && n.setAttribute("aria-selected", !1);
                            }
                            if (
                                (t(e).addClass(St),
                                "tab" === e.getAttribute("role") && e.setAttribute("aria-selected", !0),
                                    a.reflow(e),
                                e.classList.contains("fade") && e.classList.add("show"),
                                e.parentNode && t(e.parentNode).hasClass("dropdown-menu"))
                            ) {
                                var s = t(e).closest(".dropdown")[0];
                                if (s) {
                                    var r = [].slice.call(s.querySelectorAll(".dropdown-toggle"));
                                    t(r).addClass(St);
                                }
                                e.setAttribute("aria-expanded", !0);
                            }
                            i && i();
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this),
                                    o = i.data(yt);
                                if ((o || ((o = new e(this)), i.data(yt, o)), "string" == typeof n)) {
                                    if (void 0 === o[n]) throw new TypeError('No method named "' + n + '"');
                                    o[n]();
                                }
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                        ]),
                        e
                );
            })();
        t(document).on(_t.CLICK_DATA_API, '[data-toggle="tab"], [data-toggle="pill"], [data-toggle="list"]', function (e) {
            e.preventDefault(), kt._jQueryInterface.call(t(this), "show");
        }),
            (t.fn.tab = kt._jQueryInterface),
            (t.fn.tab.Constructor = kt),
            (t.fn.tab.noConflict = function () {
                return (t.fn.tab = wt), kt._jQueryInterface;
            });
        var Et = "toast",
            Ct = "bs.toast",
            At = "." + Ct,
            Lt = t.fn[Et],
            It = { CLICK_DISMISS: "click.dismiss" + At, HIDE: "hide" + At, HIDDEN: "hidden" + At, SHOW: "show" + At, SHOWN: "shown" + At },
            Dt = "show",
            Pt = "showing",
            Ot = { animation: "boolean", autohide: "boolean", delay: "number" },
            Nt = { animation: !0, autohide: !0, delay: 500 },
            jt = (function () {
                function e(e, t) {
                    (this._element = e), (this._config = this._getConfig(t)), (this._timeout = null), this._setListeners();
                }
                var n = e.prototype;
                return (
                    (n.show = function () {
                        var e = this;
                        t(this._element).trigger(It.SHOW), this._config.animation && this._element.classList.add("fade");
                        var n = function () {
                            e._element.classList.remove(Pt), e._element.classList.add(Dt), t(e._element).trigger(It.SHOWN), e._config.autohide && e.hide();
                        };
                        if ((this._element.classList.remove("hide"), this._element.classList.add(Pt), this._config.animation)) {
                            var i = a.getTransitionDurationFromElement(this._element);
                            t(this._element).one(a.TRANSITION_END, n).emulateTransitionEnd(i);
                        } else n();
                    }),
                        (n.hide = function (e) {
                            var n = this;
                            this._element.classList.contains(Dt) &&
                            (t(this._element).trigger(It.HIDE),
                                e
                                    ? this._close()
                                    : (this._timeout = setTimeout(function () {
                                        n._close();
                                    }, this._config.delay)));
                        }),
                        (n.dispose = function () {
                            clearTimeout(this._timeout),
                                (this._timeout = null),
                            this._element.classList.contains(Dt) && this._element.classList.remove(Dt),
                                t(this._element).off(It.CLICK_DISMISS),
                                t.removeData(this._element, Ct),
                                (this._element = null),
                                (this._config = null);
                        }),
                        (n._getConfig = function (e) {
                            return (e = s({}, Nt, t(this._element).data(), "object" == typeof e && e ? e : {})), a.typeCheckConfig(Et, e, this.constructor.DefaultType), e;
                        }),
                        (n._setListeners = function () {
                            var e = this;
                            t(this._element).on(It.CLICK_DISMISS, '[data-dismiss="toast"]', function () {
                                return e.hide(!0);
                            });
                        }),
                        (n._close = function () {
                            var e = this,
                                n = function () {
                                    e._element.classList.add("hide"), t(e._element).trigger(It.HIDDEN);
                                };
                            if ((this._element.classList.remove(Dt), this._config.animation)) {
                                var i = a.getTransitionDurationFromElement(this._element);
                                t(this._element).one(a.TRANSITION_END, n).emulateTransitionEnd(i);
                            } else n();
                        }),
                        (e._jQueryInterface = function (n) {
                            return this.each(function () {
                                var i = t(this),
                                    o = i.data(Ct);
                                if ((o || ((o = new e(this, "object" == typeof n && n)), i.data(Ct, o)), "string" == typeof n)) {
                                    if (void 0 === o[n]) throw new TypeError('No method named "' + n + '"');
                                    o[n](this);
                                }
                            });
                        }),
                        o(e, null, [
                            {
                                key: "VERSION",
                                get: function () {
                                    return "4.3.1";
                                },
                            },
                            {
                                key: "DefaultType",
                                get: function () {
                                    return Ot;
                                },
                            },
                            {
                                key: "Default",
                                get: function () {
                                    return Nt;
                                },
                            },
                        ]),
                        e
                );
            })();
        (t.fn[Et] = jt._jQueryInterface),
            (t.fn[Et].Constructor = jt),
            (t.fn[Et].noConflict = function () {
                return (t.fn[Et] = Lt), jt._jQueryInterface;
            }),
            (function () {
                if (void 0 === t) throw new TypeError("Bootstrap's JavaScript requires jQuery. jQuery must be included before Bootstrap's JavaScript.");
                var e = t.fn.jquery.split(" ")[0].split(".");
                if ((e[0] < 2 && e[1] < 9) || (1 === e[0] && 9 === e[1] && e[2] < 1) || 4 <= e[0]) throw new Error("Bootstrap's JavaScript requires at least jQuery v1.9.1 but less than v4.0.0");
            })(),
            (e.Util = a),
            (e.Alert = p),
            (e.Button = x),
            (e.Carousel = $),
            (e.Collapse = G),
            (e.Dropdown = he),
            (e.Modal = Ee),
            (e.Popover = it),
            (e.Scrollspy = vt),
            (e.Tab = kt),
            (e.Toast = jt),
            (e.Tooltip = Ye),
            Object.defineProperty(e, "__esModule", { value: !0 });
    }),
    (function (e) {
        "use strict";
        var t, n, i, o, s, r, a, l, c, d, u, h, p, f, m, g, v, y, b, w, _, S, x, T, k, E, C, A, L, I, D, P, O, N, j, H, M, $, z, q, W;
        e.fn.extend({
            venobox: function (R) {
                var B = this,
                    F = e.extend(
                        {
                            arrowsColor: "#B6B6B6",
                            autoplay: !1,
                            bgcolor: "#fff",
                            border: "0",
                            closeBackground: "#161617",
                            closeColor: "#d2d2d2",
                            framewidth: "",
                            frameheight: "",
                            gallItems: !1,
                            infinigall: !1,
                            htmlClose: "&times;",
                            htmlNext: "<span>Next</span>",
                            htmlPrev: "<span>Prev</span>",
                            numeratio: !1,
                            numerationBackground: "#161617",
                            numerationColor: "#d2d2d2",
                            numerationPosition: "top",
                            overlayClose: !0,
                            overlayColor: "rgba(23,23,23,0.85)",
                            spinner: "double-bounce",
                            spinColor: "#d2d2d2",
                            titleattr: "title",
                            titleBackground: "#161617",
                            titleColor: "#d2d2d2",
                            titlePosition: "top",
                            cb_pre_open: function () {
                                return !0;
                            },
                            cb_post_open: function () {},
                            cb_pre_close: function () {
                                return !0;
                            },
                            cb_post_close: function () {},
                            cb_post_resize: function () {},
                            cb_after_nav: function () {},
                            cb_content_loaded: function () {},
                            cb_init: function () {},
                        },
                        R
                    );
                return (
                    F.cb_init(B),
                        this.each(function () {
                            if ((L = e(this)).data("venobox")) return !0;
                            function R() {
                                (_ = L.data("gall")),
                                    (v = L.data("numeratio")),
                                    (h = L.data("gallItems")),
                                    (p = L.data("infinigall")),
                                    (f = h || e('.vbox-item[data-gall="' + _ + '"]')),
                                    (S = f.eq(f.index(L) + 1)),
                                    (x = f.eq(f.index(L) - 1)),
                                S.length || !0 !== p || (S = f.eq(0)),
                                    f.length > 1 ? ((I = f.index(L) + 1), i.html(I + " / " + f.length)) : (I = 1),
                                    !0 === v ? i.show() : i.hide(),
                                    "" !== w ? o.show() : o.hide(),
                                    S.length || !0 === p ? (e(".vbox-next").css("display", "block"), (T = !0)) : (e(".vbox-next").css("display", "none"), (T = !1)),
                                    f.index(L) > 0 || !0 === p ? (e(".vbox-prev").css("display", "block"), (k = !0)) : (e(".vbox-prev").css("display", "none"), (k = !1)),
                                (!0 !== k && !0 !== T) || (a.on(J.DOWN, X), a.on(J.MOVE, K), a.on(J.UP, G));
                            }
                            function U(e) {
                                return (
                                    !(e.length < 1) &&
                                    !m &&
                                    ((m = !0),
                                        (y = e.data("overlay") || e.data("overlaycolor")),
                                        (d = e.data("framewidth")),
                                        (u = e.data("frameheight")),
                                        (s = e.data("border")),
                                        (n = e.data("bgcolor")),
                                        (l = e.data("href") || e.attr("href")),
                                        (t = e.data("autoplay")),
                                        (w = e.attr(e.data("titleattr")) || ""),
                                    e === x && a.addClass("animated").addClass("swipe-right"),
                                    e === S && a.addClass("animated").addClass("swipe-left"),
                                        C.show(),
                                        void a.animate({ opacity: 0 }, 500, function () {
                                            b.css("background", y),
                                                a.removeClass("animated").removeClass("swipe-left").removeClass("swipe-right").css({ "margin-left": 0, "margin-right": 0 }),
                                                "iframe" == e.data("vbtype") ? ie() : "inline" == e.data("vbtype") ? se() : "ajax" == e.data("vbtype") ? ne() : "video" == e.data("vbtype") ? oe(t) : (a.html('<img src="' + l + '">'), re()),
                                                (L = e),
                                                R(),
                                                (m = !1),
                                                F.cb_after_nav(L, I, S, x);
                                        }))
                                );
                            }
                            function Q(e) {
                                27 === e.keyCode && Y(), 37 == e.keyCode && !0 === k && U(x), 39 == e.keyCode && !0 === T && U(S);
                            }
                            function Y() {
                                if (!1 === F.cb_pre_close(L, I, S, x)) return !1;
                                e("body").off("keydown", Q).removeClass("vbox-open"),
                                    L.focus(),
                                    b.animate({ opacity: 0 }, 500, function () {
                                        b.remove(), (m = !1), F.cb_post_close();
                                    });
                            }
                            (B.VBclose = function () {
                                Y();
                            }),
                                L.addClass("vbox-item"),
                                L.data("framewidth", F.framewidth),
                                L.data("frameheight", F.frameheight),
                                L.data("border", F.border),
                                L.data("bgcolor", F.bgcolor),
                                L.data("numeratio", F.numeratio),
                                L.data("gallItems", F.gallItems),
                                L.data("infinigall", F.infinigall),
                                L.data("overlaycolor", F.overlayColor),
                                L.data("titleattr", F.titleattr),
                                L.data("venobox", !0),
                                L.on("click", function (h) {
                                    if ((h.preventDefault(), (L = e(this)), !1 === F.cb_pre_open(L))) return !1;
                                    switch (
                                        ((B.VBnext = function () {
                                            U(S);
                                        }),
                                            (B.VBprev = function () {
                                                U(x);
                                            }),
                                            (y = L.data("overlay") || L.data("overlaycolor")),
                                            (d = L.data("framewidth")),
                                            (u = L.data("frameheight")),
                                            (t = L.data("autoplay") || F.autoplay),
                                            (s = L.data("border")),
                                            (n = L.data("bgcolor")),
                                            (T = !1),
                                            (k = !1),
                                            (m = !1),
                                            (l = L.data("href") || L.attr("href")),
                                            (c = L.data("css") || ""),
                                            (w = L.attr(L.data("titleattr")) || ""),
                                            (E = '<div class="vbox-preloader">'),
                                            F.spinner)
                                        ) {
                                        case "rotating-plane":
                                            E += '<div class="sk-rotating-plane"></div>';
                                            break;
                                        case "double-bounce":
                                            E += '<div class="sk-double-bounce"><div class="sk-child sk-double-bounce1"></div><div class="sk-child sk-double-bounce2"></div></div>';
                                            break;
                                        case "wave":
                                            E +=
                                                '<div class="sk-wave"><div class="sk-rect sk-rect1"></div><div class="sk-rect sk-rect2"></div><div class="sk-rect sk-rect3"></div><div class="sk-rect sk-rect4"></div><div class="sk-rect sk-rect5"></div></div>';
                                            break;
                                        case "wandering-cubes":
                                            E += '<div class="sk-wandering-cubes"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div></div>';
                                            break;
                                        case "spinner-pulse":
                                            E += '<div class="sk-spinner sk-spinner-pulse"></div>';
                                            break;
                                        case "chasing-dots":
                                            E += '<div class="sk-chasing-dots"><div class="sk-child sk-dot1"></div><div class="sk-child sk-dot2"></div></div>';
                                            break;
                                        case "three-bounce":
                                            E += '<div class="sk-three-bounce"><div class="sk-child sk-bounce1"></div><div class="sk-child sk-bounce2"></div><div class="sk-child sk-bounce3"></div></div>';
                                            break;
                                        case "circle":
                                            E +=
                                                '<div class="sk-circle"><div class="sk-circle1 sk-child"></div><div class="sk-circle2 sk-child"></div><div class="sk-circle3 sk-child"></div><div class="sk-circle4 sk-child"></div><div class="sk-circle5 sk-child"></div><div class="sk-circle6 sk-child"></div><div class="sk-circle7 sk-child"></div><div class="sk-circle8 sk-child"></div><div class="sk-circle9 sk-child"></div><div class="sk-circle10 sk-child"></div><div class="sk-circle11 sk-child"></div><div class="sk-circle12 sk-child"></div></div>';
                                            break;
                                        case "cube-grid":
                                            E +=
                                                '<div class="sk-cube-grid"><div class="sk-cube sk-cube1"></div><div class="sk-cube sk-cube2"></div><div class="sk-cube sk-cube3"></div><div class="sk-cube sk-cube4"></div><div class="sk-cube sk-cube5"></div><div class="sk-cube sk-cube6"></div><div class="sk-cube sk-cube7"></div><div class="sk-cube sk-cube8"></div><div class="sk-cube sk-cube9"></div></div>';
                                            break;
                                        case "fading-circle":
                                            E +=
                                                '<div class="sk-fading-circle"><div class="sk-circle1 sk-circle"></div><div class="sk-circle2 sk-circle"></div><div class="sk-circle3 sk-circle"></div><div class="sk-circle4 sk-circle"></div><div class="sk-circle5 sk-circle"></div><div class="sk-circle6 sk-circle"></div><div class="sk-circle7 sk-circle"></div><div class="sk-circle8 sk-circle"></div><div class="sk-circle9 sk-circle"></div><div class="sk-circle10 sk-circle"></div><div class="sk-circle11 sk-circle"></div><div class="sk-circle12 sk-circle"></div></div>';
                                            break;
                                        case "folding-cube":
                                            E += '<div class="sk-folding-cube"><div class="sk-cube1 sk-cube"></div><div class="sk-cube2 sk-cube"></div><div class="sk-cube4 sk-cube"></div><div class="sk-cube3 sk-cube"></div></div>';
                                    }
                                    return (
                                        (E += "</div>"),
                                            (A = '<a class="vbox-next">' + F.htmlNext + '</a><a class="vbox-prev">' + F.htmlPrev + "</a>"),
                                            (P = '<div class="vbox-title"></div><div class="vbox-num">0/0</div><div class="vbox-close">' + F.htmlClose + "</div>"),
                                            (r = '<div class="vbox-overlay ' + c + '" style="background:' + y + '">' + E + '<div class="vbox-container"><div class="vbox-content"></div></div>' + P + A + "</div>"),
                                            e("body").append(r).addClass("vbox-open"),
                                            e(".vbox-preloader div:not(.sk-circle) .sk-child, .vbox-preloader .sk-rotating-plane, .vbox-preloader .sk-rect, .vbox-preloader div:not(.sk-folding-cube) .sk-cube, .vbox-preloader .sk-spinner-pulse").css(
                                                "background-color",
                                                F.spinColor
                                            ),
                                            (b = e(".vbox-overlay")),
                                            e(".vbox-container"),
                                            (a = e(".vbox-content")),
                                            (i = e(".vbox-num")),
                                            (o = e(".vbox-title")),
                                            (C = e(".vbox-preloader")).show(),
                                            o.css(F.titlePosition, "-1px"),
                                            o.css({ color: F.titleColor, "background-color": F.titleBackground }),
                                            e(".vbox-close").css({ color: F.closeColor, "background-color": F.closeBackground }),
                                            e(".vbox-num").css(F.numerationPosition, "-1px"),
                                            e(".vbox-num").css({ color: F.numerationColor, "background-color": F.numerationBackground }),
                                            e(".vbox-next span, .vbox-prev span").css({ "border-top-color": F.arrowsColor, "border-right-color": F.arrowsColor }),
                                            a.html(""),
                                            a.css("opacity", "0"),
                                            b.css("opacity", "0"),
                                            R(),
                                            b.animate({ opacity: 1 }, 250, function () {
                                                "iframe" == L.data("vbtype") ? ie() : "inline" == L.data("vbtype") ? se() : "ajax" == L.data("vbtype") ? ne() : "video" == L.data("vbtype") ? oe(t) : (a.html('<img src="' + l + '">'), re()),
                                                    F.cb_post_open(L, I, S, x);
                                            }),
                                            e("body").keydown(Q),
                                            e(".vbox-prev").on("click", function () {
                                                U(x);
                                            }),
                                            e(".vbox-next").on("click", function () {
                                                U(S);
                                            }),
                                            !1
                                    );
                                });
                            var V = ".vbox-overlay";
                            function X(e) {
                                a.addClass("animated"), (N = H = e.pageY), (j = M = e.pageX), (D = !0);
                            }
                            function K(e) {
                                if (!0 === D) {
                                    (M = e.pageX), (H = e.pageY), (z = M - j), (q = H - N);
                                    var t = Math.abs(z);
                                    t > Math.abs(q) && t <= 100 && (e.preventDefault(), a.css("margin-left", z));
                                }
                            }
                            function G(e) {
                                if (!0 === D) {
                                    D = !1;
                                    var t = L,
                                        n = !1;
                                    ($ = M - j) < 0 && !0 === T && ((t = S), (n = !0)), $ > 0 && !0 === k && ((t = x), (n = !0)), Math.abs($) >= W && !0 === n ? U(t) : a.css({ "margin-left": 0, "margin-right": 0 });
                                }
                            }
                            F.overlayClose || (V = ".vbox-close"),
                                e("body").on("click touchstart", V, function (t) {
                                    (e(t.target).is(".vbox-overlay") || e(t.target).is(".vbox-content") || e(t.target).is(".vbox-close") || e(t.target).is(".vbox-preloader") || e(t.target).is(".vbox-container")) && Y();
                                }),
                                (j = 0),
                                (M = 0),
                                ($ = 0),
                                (W = 50),
                                (D = !1);
                            var J = { DOWN: "touchmousedown", UP: "touchmouseup", MOVE: "touchmousemove" },
                                Z = function (t) {
                                    var n;
                                    switch (t.type) {
                                        case "mousedown":
                                            n = J.DOWN;
                                            break;
                                        case "mouseup":
                                        case "mouseout":
                                            n = J.UP;
                                            break;
                                        case "mousemove":
                                            n = J.MOVE;
                                            break;
                                        default:
                                            return;
                                    }
                                    var i = te(n, t, t.pageX, t.pageY);
                                    e(t.target).trigger(i);
                                },
                                ee = function (t) {
                                    var n;
                                    switch (t.type) {
                                        case "touchstart":
                                            n = J.DOWN;
                                            break;
                                        case "touchend":
                                            n = J.UP;
                                            break;
                                        case "touchmove":
                                            n = J.MOVE;
                                            break;
                                        default:
                                            return;
                                    }
                                    var i,
                                        o = t.originalEvent.touches[0];
                                    (i = n == J.UP ? te(n, t, null, null) : te(n, t, o.pageX, o.pageY)), e(t.target).trigger(i);
                                },
                                te = function (t, n, i, o) {
                                    return e.Event(t, { pageX: i, pageY: o, originalEvent: n });
                                };
                            function ne() {
                                e.ajax({ url: l, cache: !1 })
                                    .done(function (e) {
                                        a.html('<div class="vbox-inline">' + e + "</div>"), re();
                                    })
                                    .fail(function () {
                                        a.html('<div class="vbox-inline"><p>Error retrieving contents, please retry</div>'), ae();
                                    });
                            }
                            function ie() {
                                a.html('<iframe class="venoframe" src="' + l + '"></iframe>'), ae();
                            }
                            function oe(e) {
                                var t,
                                    n = (function (e) {
                                        var t;
                                        return (
                                            l.match(/(http:|https:|)\/\/(player.|www.)?(vimeo\.com|youtu(be\.com|\.be|be\.googleapis\.com))\/(video\/|embed\/|watch\?v=|v\/)?([A-Za-z0-9._%-]*)(\&\S+)?/),
                                                RegExp.$3.indexOf("youtu") > -1 ? (t = "youtube") : RegExp.$3.indexOf("vimeo") > -1 && (t = "vimeo"),
                                                { type: t, id: RegExp.$6 }
                                        );
                                    })(),
                                    i =
                                        (e ? "?rel=0&autoplay=1" : "?rel=0") +
                                        (function (e) {
                                            var t = "",
                                                n = decodeURIComponent(l).split("?");
                                            if (void 0 !== n[1]) {
                                                var i,
                                                    o,
                                                    s = n[1].split("&");
                                                for (o = 0; o < s.length; o++) t = t + "&" + (i = s[o].split("="))[0] + "=" + i[1];
                                            }
                                            return encodeURI(t);
                                        })();
                                "vimeo" == n.type ? (t = "https://player.vimeo.com/video/") : "youtube" == n.type && (t = "https://www.youtube.com/embed/"),
                                    a.html('<iframe class="venoframe vbvid" webkitallowfullscreen mozallowfullscreen allowfullscreen allow="autoplay" frameborder="0" src="' + t + n.id + i + '"></iframe>'),
                                    ae();
                            }
                            function se() {
                                a.html('<div class="vbox-inline">' + e(l).html() + "</div>"), ae();
                            }
                            function re() {
                                (O = a.find("img")).length
                                    ? O.each(function () {
                                        e(this).one("load", function () {
                                            ae();
                                        });
                                    })
                                    : ae();
                            }
                            function ae() {
                                o.html(w),
                                    a.find(">:first-child").addClass("figlio").css({ width: d, height: u, padding: s, background: n }),
                                    e("img.figlio").on("dragstart", function (e) {
                                        e.preventDefault();
                                    }),
                                    le(),
                                    a.animate({ opacity: "1" }, "slow", function () {
                                        C.hide();
                                    }),
                                    F.cb_content_loaded(L, I, S, x);
                            }
                            function le() {
                                var t = a.outerHeight(),
                                    n = e(window).height();
                                (g = t + 60 < n ? (n - t) / 2 : "30px"), a.css("margin-top", g), a.css("margin-bottom", g), F.cb_post_resize();
                            }
                            "ontouchstart" in window
                                ? (e(document).on("touchstart", ee), e(document).on("touchmove", ee), e(document).on("touchend", ee))
                                : (e(document).on("mousedown", Z), e(document).on("mouseup", Z), e(document).on("mouseout", Z), e(document).on("mousemove", Z)),
                                e(window).resize(function () {
                                    e(".vbox-content").length && setTimeout(le(), 800);
                                });
                        })
                );
            },
        });
    })(jQuery),
    function () {
        var e =
                [].indexOf ||
                function (e) {
                    for (var t = 0, n = this.length; t < n; t++) if (t in this && this[t] === e) return t;
                    return -1;
                },
            t = [].slice;
        !(function (e, t) {
            "function" == typeof define && define.amd
                ? define("waypoints", ["jquery"], function (n) {
                    return t(n, e);
                })
                : t(e.jQuery, e);
        })(this, function (n, i) {
            var o, s, r, a, l, c, d, u, h, p, f, m, g, v, y, b;
            return (
                (o = n(i)),
                    (u = e.call(i, "ontouchstart") >= 0),
                    (a = { horizontal: {}, vertical: {} }),
                    (l = 1),
                    (d = {}),
                    (c = "waypoints-context-id"),
                    (f = "resize.waypoints"),
                    (m = "scroll.waypoints"),
                    (g = 1),
                    (v = "waypoints-waypoint-ids"),
                    (y = "waypoint"),
                    (b = "waypoints"),
                    (s = (function () {
                        function e(e) {
                            var t = this;
                            (this.$element = e),
                                (this.element = e[0]),
                                (this.didResize = !1),
                                (this.didScroll = !1),
                                (this.id = "context" + l++),
                                (this.oldScroll = { x: e.scrollLeft(), y: e.scrollTop() }),
                                (this.waypoints = { horizontal: {}, vertical: {} }),
                                e.data(c, this.id),
                                (d[this.id] = this),
                                e.bind(m, function () {
                                    var e;
                                    if (!t.didScroll && !u)
                                        return (
                                            (t.didScroll = !0),
                                                (e = function () {
                                                    return t.doScroll(), (t.didScroll = !1);
                                                }),
                                                i.setTimeout(e, n[b].settings.scrollThrottle)
                                        );
                                }),
                                e.bind(f, function () {
                                    var e;
                                    if (!t.didResize)
                                        return (
                                            (t.didResize = !0),
                                                (e = function () {
                                                    return n[b]("refresh"), (t.didResize = !1);
                                                }),
                                                i.setTimeout(e, n[b].settings.resizeThrottle)
                                        );
                                });
                        }
                        return (
                            (e.prototype.doScroll = function () {
                                var e,
                                    t = this;
                                return (
                                    (e = {
                                        horizontal: { newScroll: this.$element.scrollLeft(), oldScroll: this.oldScroll.x, forward: "right", backward: "left" },
                                        vertical: { newScroll: this.$element.scrollTop(), oldScroll: this.oldScroll.y, forward: "down", backward: "up" },
                                    }),
                                    !u || (e.vertical.oldScroll && e.vertical.newScroll) || n[b]("refresh"),
                                        n.each(e, function (e, i) {
                                            var o, s, r;
                                            return (
                                                (r = []),
                                                    (s = i.newScroll > i.oldScroll),
                                                    (o = s ? i.forward : i.backward),
                                                    n.each(t.waypoints[e], function (e, t) {
                                                        var n, o;
                                                        return i.oldScroll < (n = t.offset) && n <= i.newScroll ? r.push(t) : i.newScroll < (o = t.offset) && o <= i.oldScroll ? r.push(t) : void 0;
                                                    }),
                                                    r.sort(function (e, t) {
                                                        return e.offset - t.offset;
                                                    }),
                                                s || r.reverse(),
                                                    n.each(r, function (e, t) {
                                                        if (t.options.continuous || e === r.length - 1) return t.trigger([o]);
                                                    })
                                            );
                                        }),
                                        (this.oldScroll = { x: e.horizontal.newScroll, y: e.vertical.newScroll })
                                );
                            }),
                                (e.prototype.refresh = function () {
                                    var e,
                                        t,
                                        i,
                                        o = this;
                                    return (
                                        (i = n.isWindow(this.element)),
                                            (t = this.$element.offset()),
                                            this.doScroll(),
                                            (e = {
                                                horizontal: {
                                                    contextOffset: i ? 0 : t.left,
                                                    contextScroll: i ? 0 : this.oldScroll.x,
                                                    contextDimension: this.$element.width(),
                                                    oldScroll: this.oldScroll.x,
                                                    forward: "right",
                                                    backward: "left",
                                                    offsetProp: "left",
                                                },
                                                vertical: {
                                                    contextOffset: i ? 0 : t.top,
                                                    contextScroll: i ? 0 : this.oldScroll.y,
                                                    contextDimension: i ? n[b]("viewportHeight") : this.$element.height(),
                                                    oldScroll: this.oldScroll.y,
                                                    forward: "down",
                                                    backward: "up",
                                                    offsetProp: "top",
                                                },
                                            }),
                                            n.each(e, function (e, t) {
                                                return n.each(o.waypoints[e], function (e, i) {
                                                    var o, s, r, a, l;
                                                    if (
                                                        ((o = i.options.offset),
                                                            (r = i.offset),
                                                            (s = n.isWindow(i.element) ? 0 : i.$element.offset()[t.offsetProp]),
                                                            n.isFunction(o) ? (o = o.apply(i.element)) : "string" == typeof o && ((o = parseFloat(o)), i.options.offset.indexOf("%") > -1 && (o = Math.ceil((t.contextDimension * o) / 100))),
                                                            (i.offset = s - t.contextOffset + t.contextScroll - o),
                                                        (!i.options.onlyOnScroll || null == r) && i.enabled)
                                                    )
                                                        return null !== r && r < (a = t.oldScroll) && a <= i.offset
                                                            ? i.trigger([t.backward])
                                                            : null !== r && r > (l = t.oldScroll) && l >= i.offset
                                                                ? i.trigger([t.forward])
                                                                : null === r && t.oldScroll >= i.offset
                                                                    ? i.trigger([t.forward])
                                                                    : void 0;
                                                });
                                            })
                                    );
                                }),
                                (e.prototype.checkEmpty = function () {
                                    if (n.isEmptyObject(this.waypoints.horizontal) && n.isEmptyObject(this.waypoints.vertical)) return this.$element.unbind([f, m].join(" ")), delete d[this.id];
                                }),
                                e
                        );
                    })()),
                    (r = (function () {
                        function e(e, t, i) {
                            var o, s;
                            "bottom-in-view" === (i = n.extend({}, n.fn[y].defaults, i)).offset &&
                            (i.offset = function () {
                                var e;
                                return (e = n[b]("viewportHeight")), n.isWindow(t.element) || (e = t.$element.height()), e - n(this).outerHeight();
                            }),
                                (this.$element = e),
                                (this.element = e[0]),
                                (this.axis = i.horizontal ? "horizontal" : "vertical"),
                                (this.callback = i.handler),
                                (this.context = t),
                                (this.enabled = i.enabled),
                                (this.id = "waypoints" + g++),
                                (this.offset = null),
                                (this.options = i),
                                (t.waypoints[this.axis][this.id] = this),
                                (a[this.axis][this.id] = this),
                                (o = null != (s = e.data(v)) ? s : []).push(this.id),
                                e.data(v, o);
                        }
                        return (
                            (e.prototype.trigger = function (e) {
                                if (this.enabled) return null != this.callback && this.callback.apply(this.element, e), this.options.triggerOnce ? this.destroy() : void 0;
                            }),
                                (e.prototype.disable = function () {
                                    return (this.enabled = !1);
                                }),
                                (e.prototype.enable = function () {
                                    return this.context.refresh(), (this.enabled = !0);
                                }),
                                (e.prototype.destroy = function () {
                                    return delete a[this.axis][this.id], delete this.context.waypoints[this.axis][this.id], this.context.checkEmpty();
                                }),
                                (e.getWaypointsByElement = function (e) {
                                    var t, i;
                                    return (i = n(e).data(v))
                                        ? ((t = n.extend({}, a.horizontal, a.vertical)),
                                            n.map(i, function (e) {
                                                return t[e];
                                            }))
                                        : [];
                                }),
                                e
                        );
                    })()),
                    (p = {
                        init: function (e, t) {
                            return (
                                null == t && (t = {}),
                                null == t.handler && (t.handler = e),
                                    this.each(function () {
                                        var e, i, o, a;
                                        return (e = n(this)), (o = null != (a = t.context) ? a : n.fn[y].defaults.context), n.isWindow(o) || (o = e.closest(o)), (o = n(o)), (i = d[o.data(c)]) || (i = new s(o)), new r(e, i, t);
                                    }),
                                    n[b]("refresh"),
                                    this
                            );
                        },
                        disable: function () {
                            return p._invoke(this, "disable");
                        },
                        enable: function () {
                            return p._invoke(this, "enable");
                        },
                        destroy: function () {
                            return p._invoke(this, "destroy");
                        },
                        prev: function (e, t) {
                            return p._traverse.call(this, e, t, function (e, t, n) {
                                if (t > 0) return e.push(n[t - 1]);
                            });
                        },
                        next: function (e, t) {
                            return p._traverse.call(this, e, t, function (e, t, n) {
                                if (t < n.length - 1) return e.push(n[t + 1]);
                            });
                        },
                        _traverse: function (e, t, o) {
                            var s, r;
                            return (
                                null == e && (e = "vertical"),
                                null == t && (t = i),
                                    (r = h.aggregate(t)),
                                    (s = []),
                                    this.each(function () {
                                        var t;
                                        return (t = n.inArray(this, r[e])), o(s, t, r[e]);
                                    }),
                                    this.pushStack(s)
                            );
                        },
                        _invoke: function (e, t) {
                            return (
                                e.each(function () {
                                    var e;
                                    return (
                                        (e = r.getWaypointsByElement(this)),
                                            n.each(e, function (e, n) {
                                                return n[t](), !0;
                                            })
                                    );
                                }),
                                    this
                            );
                        },
                    }),
                    (n.fn[y] = function () {
                        var e, i;
                        return (
                            (i = arguments[0]),
                                (e = 2 <= arguments.length ? t.call(arguments, 1) : []),
                                p[i]
                                    ? p[i].apply(this, e)
                                    : n.isFunction(i)
                                        ? p.init.apply(this, arguments)
                                        : n.isPlainObject(i)
                                            ? p.init.apply(this, [null, i])
                                            : i
                                                ? n.error("The " + i + " method does not exist in jQuery Waypoints.")
                                                : n.error("jQuery Waypoints needs a callback function or handler option.")
                        );
                    }),
                    (n.fn[y].defaults = { context: i, continuous: !0, enabled: !0, horizontal: !1, offset: 0, triggerOnce: !1 }),
                    (h = {
                        refresh: function () {
                            return n.each(d, function (e, t) {
                                return t.refresh();
                            });
                        },
                        viewportHeight: function () {
                            var e;
                            return null != (e = i.innerHeight) ? e : o.height();
                        },
                        aggregate: function (e) {
                            var t, i, o;
                            return (
                                (t = a),
                                e && (t = null != (o = d[n(e).data(c)]) ? o.waypoints : void 0),
                                    t
                                        ? ((i = { horizontal: [], vertical: [] }),
                                            n.each(i, function (e, o) {
                                                return (
                                                    n.each(t[e], function (e, t) {
                                                        return o.push(t);
                                                    }),
                                                        o.sort(function (e, t) {
                                                            return e.offset - t.offset;
                                                        }),
                                                        (i[e] = n.map(o, function (e) {
                                                            return e.element;
                                                        })),
                                                        (i[e] = n.unique(i[e]))
                                                );
                                            }),
                                            i)
                                        : []
                            );
                        },
                        above: function (e) {
                            return (
                                null == e && (e = i),
                                    h._filter(e, "vertical", function (e, t) {
                                        return t.offset <= e.oldScroll.y;
                                    })
                            );
                        },
                        below: function (e) {
                            return (
                                null == e && (e = i),
                                    h._filter(e, "vertical", function (e, t) {
                                        return t.offset > e.oldScroll.y;
                                    })
                            );
                        },
                        left: function (e) {
                            return (
                                null == e && (e = i),
                                    h._filter(e, "horizontal", function (e, t) {
                                        return t.offset <= e.oldScroll.x;
                                    })
                            );
                        },
                        right: function (e) {
                            return (
                                null == e && (e = i),
                                    h._filter(e, "horizontal", function (e, t) {
                                        return t.offset > e.oldScroll.x;
                                    })
                            );
                        },
                        enable: function () {
                            return h._invoke("enable");
                        },
                        disable: function () {
                            return h._invoke("disable");
                        },
                        destroy: function () {
                            return h._invoke("destroy");
                        },
                        extendFn: function (e, t) {
                            return (p[e] = t);
                        },
                        _invoke: function (e) {
                            var t;
                            return (
                                (t = n.extend({}, a.vertical, a.horizontal)),
                                    n.each(t, function (t, n) {
                                        return n[e](), !0;
                                    })
                            );
                        },
                        _filter: function (e, t, i) {
                            var o, s;
                            return (o = d[n(e).data(c)])
                                ? ((s = []),
                                    n.each(o.waypoints[t], function (e, t) {
                                        if (i(o, t)) return s.push(t);
                                    }),
                                    s.sort(function (e, t) {
                                        return e.offset - t.offset;
                                    }),
                                    n.map(s, function (e) {
                                        return e.element;
                                    }))
                                : [];
                        },
                    }),
                    (n[b] = function () {
                        var e, n;
                        return (n = arguments[0]), (e = 2 <= arguments.length ? t.call(arguments, 1) : []), h[n] ? h[n].apply(null, e) : h.aggregate.call(null, n);
                    }),
                    (n[b].settings = { resizeThrottle: 100, scrollThrottle: 30 }),
                    o.load(function () {
                        return n[b]("refresh");
                    })
            );
        });
    }.call(this),
    (function (e) {
        "use strict";
        "function" == typeof define && define.amd ? define(["jquery"], e) : "undefined" != typeof exports ? (module.exports = e(require("jquery"))) : e(jQuery);
    })(function (e) {
        "use strict";
        var t = window.Slick || {};
        ((t = (function () {
            var t = 0;
            return function (n, i) {
                var o,
                    s = this;
                (s.defaults = {
                    accessibility: !0,
                    adaptiveHeight: !1,
                    appendArrows: e(n),
                    appendDots: e(n),
                    arrows: !0,
                    asNavFor: null,
                    prevArrow: '<button class="slick-prev" aria-label="Previous" type="button">Previous</button>',
                    nextArrow: '<button class="slick-next" aria-label="Next" type="button">Next</button>',
                    autoplay: !1,
                    autoplaySpeed: 3e3,
                    centerMode: !1,
                    centerPadding: "50px",
                    cssEase: "ease",
                    customPaging: function (t, n) {
                        return e('<button type="button" />').text(n + 1);
                    },
                    dots: !1,
                    dotsClass: "slick-dots",
                    draggable: !0,
                    easing: "linear",
                    edgeFriction: 0.35,
                    fade: !1,
                    focusOnSelect: !1,
                    focusOnChange: !1,
                    infinite: !0,
                    initialSlide: 0,
                    lazyLoad: "ondemand",
                    mobileFirst: !1,
                    pauseOnHover: !0,
                    pauseOnFocus: !0,
                    pauseOnDotsHover: !1,
                    respondTo: "window",
                    responsive: null,
                    rows: 1,
                    rtl: !1,
                    slide: "",
                    slidesPerRow: 1,
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    speed: 500,
                    swipe: !0,
                    swipeToSlide: !1,
                    touchMove: !0,
                    touchThreshold: 5,
                    useCSS: !0,
                    useTransform: !0,
                    variableWidth: !1,
                    vertical: !1,
                    verticalSwiping: !1,
                    waitForAnimate: !0,
                    zIndex: 1e3,
                }),
                    (s.initials = {
                        animating: !1,
                        dragging: !1,
                        autoPlayTimer: null,
                        currentDirection: 0,
                        currentLeft: null,
                        currentSlide: 0,
                        direction: 1,
                        $dots: null,
                        listWidth: null,
                        listHeight: null,
                        loadIndex: 0,
                        $nextArrow: null,
                        $prevArrow: null,
                        scrolling: !1,
                        slideCount: null,
                        slideWidth: null,
                        $slideTrack: null,
                        $slides: null,
                        sliding: !1,
                        slideOffset: 0,
                        swipeLeft: null,
                        swiping: !1,
                        $list: null,
                        touchObject: {},
                        transformsEnabled: !1,
                        unslicked: !1,
                    }),
                    e.extend(s, s.initials),
                    (s.activeBreakpoint = null),
                    (s.animType = null),
                    (s.animProp = null),
                    (s.breakpoints = []),
                    (s.breakpointSettings = []),
                    (s.cssTransitions = !1),
                    (s.focussed = !1),
                    (s.interrupted = !1),
                    (s.hidden = "hidden"),
                    (s.paused = !0),
                    (s.positionProp = null),
                    (s.respondTo = null),
                    (s.rowCount = 1),
                    (s.shouldClick = !0),
                    (s.$slider = e(n)),
                    (s.$slidesCache = null),
                    (s.transformType = null),
                    (s.transitionType = null),
                    (s.visibilityChange = "visibilitychange"),
                    (s.windowWidth = 0),
                    (s.windowTimer = null),
                    (o = e(n).data("slick") || {}),
                    (s.options = e.extend({}, s.defaults, i, o)),
                    (s.currentSlide = s.options.initialSlide),
                    (s.originalSettings = s.options),
                    void 0 !== document.mozHidden
                        ? ((s.hidden = "mozHidden"), (s.visibilityChange = "mozvisibilitychange"))
                        : void 0 !== document.webkitHidden && ((s.hidden = "webkitHidden"), (s.visibilityChange = "webkitvisibilitychange")),
                    (s.autoPlay = e.proxy(s.autoPlay, s)),
                    (s.autoPlayClear = e.proxy(s.autoPlayClear, s)),
                    (s.autoPlayIterator = e.proxy(s.autoPlayIterator, s)),
                    (s.changeSlide = e.proxy(s.changeSlide, s)),
                    (s.clickHandler = e.proxy(s.clickHandler, s)),
                    (s.selectHandler = e.proxy(s.selectHandler, s)),
                    (s.setPosition = e.proxy(s.setPosition, s)),
                    (s.swipeHandler = e.proxy(s.swipeHandler, s)),
                    (s.dragHandler = e.proxy(s.dragHandler, s)),
                    (s.keyHandler = e.proxy(s.keyHandler, s)),
                    (s.instanceUid = t++),
                    (s.htmlExpr = /^(?:\s*(<[\w\W]+>)[^>]*)$/),
                    s.registerBreakpoints(),
                    s.init(!0);
            };
        })()).prototype.activateADA = function () {
            this.$slideTrack.find(".slick-active").attr({ "aria-hidden": "false" }).find("a, input, button, select").attr({ tabindex: "0" });
        }),
            (t.prototype.addSlide = t.prototype.slickAdd = function (t, n, i) {
                var o = this;
                if ("boolean" == typeof n) (i = n), (n = null);
                else if (n < 0 || n >= o.slideCount) return !1;
                o.unload(),
                    "number" == typeof n
                        ? 0 === n && 0 === o.$slides.length
                            ? e(t).appendTo(o.$slideTrack)
                            : i
                                ? e(t).insertBefore(o.$slides.eq(n))
                                : e(t).insertAfter(o.$slides.eq(n))
                        : !0 === i
                            ? e(t).prependTo(o.$slideTrack)
                            : e(t).appendTo(o.$slideTrack),
                    (o.$slides = o.$slideTrack.children(this.options.slide)),
                    o.$slideTrack.children(this.options.slide).detach(),
                    o.$slideTrack.append(o.$slides),
                    o.$slides.each(function (t, n) {
                        e(n).attr("data-slick-index", t);
                    }),
                    (o.$slidesCache = o.$slides),
                    o.reinit();
            }),
            (t.prototype.animateHeight = function () {
                var e = this;
                if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
                    var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
                    e.$list.animate({ height: t }, e.options.speed);
                }
            }),
            (t.prototype.animateSlide = function (t, n) {
                var i = {},
                    o = this;
                o.animateHeight(),
                !0 === o.options.rtl && !1 === o.options.vertical && (t = -t),
                    !1 === o.transformsEnabled
                        ? !1 === o.options.vertical
                            ? o.$slideTrack.animate({ left: t }, o.options.speed, o.options.easing, n)
                            : o.$slideTrack.animate({ top: t }, o.options.speed, o.options.easing, n)
                        : !1 === o.cssTransitions
                            ? (!0 === o.options.rtl && (o.currentLeft = -o.currentLeft),
                                e({ animStart: o.currentLeft }).animate(
                                    { animStart: t },
                                    {
                                        duration: o.options.speed,
                                        easing: o.options.easing,
                                        step: function (e) {
                                            (e = Math.ceil(e)), !1 === o.options.vertical ? ((i[o.animType] = "translate(" + e + "px, 0px)"), o.$slideTrack.css(i)) : ((i[o.animType] = "translate(0px," + e + "px)"), o.$slideTrack.css(i));
                                        },
                                        complete: function () {
                                            n && n.call();
                                        },
                                    }
                                ))
                            : (o.applyTransition(),
                                (t = Math.ceil(t)),
                                !1 === o.options.vertical ? (i[o.animType] = "translate3d(" + t + "px, 0px, 0px)") : (i[o.animType] = "translate3d(0px," + t + "px, 0px)"),
                                o.$slideTrack.css(i),
                            n &&
                            setTimeout(function () {
                                o.disableTransition(), n.call();
                            }, o.options.speed));
            }),
            (t.prototype.getNavTarget = function () {
                var t = this.options.asNavFor;
                return t && null !== t && (t = e(t).not(this.$slider)), t;
            }),
            (t.prototype.asNavFor = function (t) {
                var n = this.getNavTarget();
                null !== n &&
                "object" == typeof n &&
                n.each(function () {
                    var n = e(this).slick("getSlick");
                    n.unslicked || n.slideHandler(t, !0);
                });
            }),
            (t.prototype.applyTransition = function (e) {
                var t = this,
                    n = {};
                !1 === t.options.fade ? (n[t.transitionType] = t.transformType + " " + t.options.speed + "ms " + t.options.cssEase) : (n[t.transitionType] = "opacity " + t.options.speed + "ms " + t.options.cssEase),
                    !1 === t.options.fade ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n);
            }),
            (t.prototype.autoPlay = function () {
                var e = this;
                e.autoPlayClear(), e.slideCount > e.options.slidesToShow && (e.autoPlayTimer = setInterval(e.autoPlayIterator, e.options.autoplaySpeed));
            }),
            (t.prototype.autoPlayClear = function () {
                this.autoPlayTimer && clearInterval(this.autoPlayTimer);
            }),
            (t.prototype.autoPlayIterator = function () {
                var e = this,
                    t = e.currentSlide + e.options.slidesToScroll;
                e.paused ||
                e.interrupted ||
                e.focussed ||
                (!1 === e.options.infinite &&
                (1 === e.direction && e.currentSlide + 1 === e.slideCount - 1 ? (e.direction = 0) : 0 === e.direction && ((t = e.currentSlide - e.options.slidesToScroll), e.currentSlide - 1 == 0 && (e.direction = 1))),
                    e.slideHandler(t));
            }),
            (t.prototype.buildArrows = function () {
                var t = this;
                !0 === t.options.arrows &&
                ((t.$prevArrow = e(t.options.prevArrow).addClass("slick-arrow")),
                    (t.$nextArrow = e(t.options.nextArrow).addClass("slick-arrow")),
                    t.slideCount > t.options.slidesToShow
                        ? (t.$prevArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                            t.$nextArrow.removeClass("slick-hidden").removeAttr("aria-hidden tabindex"),
                        t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.prependTo(t.options.appendArrows),
                        t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.appendTo(t.options.appendArrows),
                        !0 !== t.options.infinite && t.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"))
                        : t.$prevArrow.add(t.$nextArrow).addClass("slick-hidden").attr({ "aria-disabled": "true", tabindex: "-1" }));
            }),
            (t.prototype.buildDots = function () {
                var t,
                    n,
                    i = this;
                if (!0 === i.options.dots) {
                    for (i.$slider.addClass("slick-dotted"), n = e("<ul />").addClass(i.options.dotsClass), t = 0; t <= i.getDotCount(); t += 1) n.append(e("<li />").append(i.options.customPaging.call(this, i, t)));
                    (i.$dots = n.appendTo(i.options.appendDots)), i.$dots.find("li").first().addClass("slick-active");
                }
            }),
            (t.prototype.buildOut = function () {
                var t = this;
                (t.$slides = t.$slider.children(t.options.slide + ":not(.slick-cloned)").addClass("slick-slide")),
                    (t.slideCount = t.$slides.length),
                    t.$slides.each(function (t, n) {
                        e(n)
                            .attr("data-slick-index", t)
                            .data("originalStyling", e(n).attr("style") || "");
                    }),
                    t.$slider.addClass("slick-slider"),
                    (t.$slideTrack = 0 === t.slideCount ? e('<div class="slick-track"/>').appendTo(t.$slider) : t.$slides.wrapAll('<div class="slick-track"/>').parent()),
                    (t.$list = t.$slideTrack.wrap('<div class="slick-list"/>').parent()),
                    t.$slideTrack.css("opacity", 0),
                (!0 !== t.options.centerMode && !0 !== t.options.swipeToSlide) || (t.options.slidesToScroll = 1),
                    e("img[data-lazy]", t.$slider).not("[src]").addClass("slick-loading"),
                    t.setupInfinite(),
                    t.buildArrows(),
                    t.buildDots(),
                    t.updateDots(),
                    t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0),
                !0 === t.options.draggable && t.$list.addClass("draggable");
            }),
            (t.prototype.buildRows = function () {
                var e,
                    t,
                    n,
                    i,
                    o,
                    s,
                    r,
                    a = this;
                if (((i = document.createDocumentFragment()), (s = a.$slider.children()), a.options.rows > 1)) {
                    for (r = a.options.slidesPerRow * a.options.rows, o = Math.ceil(s.length / r), e = 0; e < o; e++) {
                        var l = document.createElement("div");
                        for (t = 0; t < a.options.rows; t++) {
                            var c = document.createElement("div");
                            for (n = 0; n < a.options.slidesPerRow; n++) {
                                var d = e * r + (t * a.options.slidesPerRow + n);
                                s.get(d) && c.appendChild(s.get(d));
                            }
                            l.appendChild(c);
                        }
                        i.appendChild(l);
                    }
                    a.$slider.empty().append(i),
                        a.$slider
                            .children()
                            .children()
                            .children()
                            .css({ width: 100 / a.options.slidesPerRow + "%", display: "inline-block" });
                }
            }),
            (t.prototype.checkResponsive = function (t, n) {
                var i,
                    o,
                    s,
                    r = this,
                    a = !1,
                    l = r.$slider.width(),
                    c = window.innerWidth || e(window).width();
                if (("window" === r.respondTo ? (s = c) : "slider" === r.respondTo ? (s = l) : "min" === r.respondTo && (s = Math.min(c, l)), r.options.responsive && r.options.responsive.length && null !== r.options.responsive)) {
                    for (i in ((o = null), r.breakpoints)) r.breakpoints.hasOwnProperty(i) && (!1 === r.originalSettings.mobileFirst ? s < r.breakpoints[i] && (o = r.breakpoints[i]) : s > r.breakpoints[i] && (o = r.breakpoints[i]));
                    null !== o
                        ? null !== r.activeBreakpoint
                            ? (o !== r.activeBreakpoint || n) &&
                            ((r.activeBreakpoint = o),
                                "unslick" === r.breakpointSettings[o] ? r.unslick(o) : ((r.options = e.extend({}, r.originalSettings, r.breakpointSettings[o])), !0 === t && (r.currentSlide = r.options.initialSlide), r.refresh(t)),
                                (a = o))
                            : ((r.activeBreakpoint = o),
                                "unslick" === r.breakpointSettings[o] ? r.unslick(o) : ((r.options = e.extend({}, r.originalSettings, r.breakpointSettings[o])), !0 === t && (r.currentSlide = r.options.initialSlide), r.refresh(t)),
                                (a = o))
                        : null !== r.activeBreakpoint && ((r.activeBreakpoint = null), (r.options = r.originalSettings), !0 === t && (r.currentSlide = r.options.initialSlide), r.refresh(t), (a = o)),
                    t || !1 === a || r.$slider.trigger("breakpoint", [r, a]);
                }
            }),
            (t.prototype.changeSlide = function (t, n) {
                var i,
                    o,
                    s = this,
                    r = e(t.currentTarget);
                switch ((r.is("a") && t.preventDefault(), r.is("li") || (r = r.closest("li")), (i = s.slideCount % s.options.slidesToScroll != 0 ? 0 : (s.slideCount - s.currentSlide) % s.options.slidesToScroll), t.data.message)) {
                    case "previous":
                        (o = 0 === i ? s.options.slidesToScroll : s.options.slidesToShow - i), s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide - o, !1, n);
                        break;
                    case "next":
                        (o = 0 === i ? s.options.slidesToScroll : i), s.slideCount > s.options.slidesToShow && s.slideHandler(s.currentSlide + o, !1, n);
                        break;
                    case "index":
                        var a = 0 === t.data.index ? 0 : t.data.index || r.index() * s.options.slidesToScroll;
                        s.slideHandler(s.checkNavigable(a), !1, n), r.children().trigger("focus");
                        break;
                    default:
                        return;
                }
            }),
            (t.prototype.checkNavigable = function (e) {
                var t, n;
                if (((n = 0), e > (t = this.getNavigableIndexes())[t.length - 1])) e = t[t.length - 1];
                else
                    for (var i in t) {
                        if (e < t[i]) {
                            e = n;
                            break;
                        }
                        n = t[i];
                    }
                return e;
            }),
            (t.prototype.cleanUpEvents = function () {
                var t = this;
                t.options.dots &&
                null !== t.$dots &&
                (e("li", t.$dots).off("click.slick", t.changeSlide).off("mouseenter.slick", e.proxy(t.interrupt, t, !0)).off("mouseleave.slick", e.proxy(t.interrupt, t, !1)),
                !0 === t.options.accessibility && t.$dots.off("keydown.slick", t.keyHandler)),
                    t.$slider.off("focus.slick blur.slick"),
                !0 === t.options.arrows &&
                t.slideCount > t.options.slidesToShow &&
                (t.$prevArrow && t.$prevArrow.off("click.slick", t.changeSlide),
                t.$nextArrow && t.$nextArrow.off("click.slick", t.changeSlide),
                !0 === t.options.accessibility && (t.$prevArrow && t.$prevArrow.off("keydown.slick", t.keyHandler), t.$nextArrow && t.$nextArrow.off("keydown.slick", t.keyHandler))),
                    t.$list.off("touchstart.slick mousedown.slick", t.swipeHandler),
                    t.$list.off("touchmove.slick mousemove.slick", t.swipeHandler),
                    t.$list.off("touchend.slick mouseup.slick", t.swipeHandler),
                    t.$list.off("touchcancel.slick mouseleave.slick", t.swipeHandler),
                    t.$list.off("click.slick", t.clickHandler),
                    e(document).off(t.visibilityChange, t.visibility),
                    t.cleanUpSlideEvents(),
                !0 === t.options.accessibility && t.$list.off("keydown.slick", t.keyHandler),
                !0 === t.options.focusOnSelect && e(t.$slideTrack).children().off("click.slick", t.selectHandler),
                    e(window).off("orientationchange.slick.slick-" + t.instanceUid, t.orientationChange),
                    e(window).off("resize.slick.slick-" + t.instanceUid, t.resize),
                    e("[draggable!=true]", t.$slideTrack).off("dragstart", t.preventDefault),
                    e(window).off("load.slick.slick-" + t.instanceUid, t.setPosition);
            }),
            (t.prototype.cleanUpSlideEvents = function () {
                var t = this;
                t.$list.off("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.off("mouseleave.slick", e.proxy(t.interrupt, t, !1));
            }),
            (t.prototype.cleanUpRows = function () {
                var e,
                    t = this;
                t.options.rows > 1 && ((e = t.$slides.children().children()).removeAttr("style"), t.$slider.empty().append(e));
            }),
            (t.prototype.clickHandler = function (e) {
                !1 === this.shouldClick && (e.stopImmediatePropagation(), e.stopPropagation(), e.preventDefault());
            }),
            (t.prototype.destroy = function (t) {
                var n = this;
                n.autoPlayClear(),
                    (n.touchObject = {}),
                    n.cleanUpEvents(),
                    e(".slick-cloned", n.$slider).detach(),
                n.$dots && n.$dots.remove(),
                n.$prevArrow &&
                n.$prevArrow.length &&
                (n.$prevArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), n.htmlExpr.test(n.options.prevArrow) && n.$prevArrow.remove()),
                n.$nextArrow &&
                n.$nextArrow.length &&
                (n.$nextArrow.removeClass("slick-disabled slick-arrow slick-hidden").removeAttr("aria-hidden aria-disabled tabindex").css("display", ""), n.htmlExpr.test(n.options.nextArrow) && n.$nextArrow.remove()),
                n.$slides &&
                (n.$slides
                    .removeClass("slick-slide slick-active slick-center slick-visible slick-current")
                    .removeAttr("aria-hidden")
                    .removeAttr("data-slick-index")
                    .each(function () {
                        e(this).attr("style", e(this).data("originalStyling"));
                    }),
                    n.$slideTrack.children(this.options.slide).detach(),
                    n.$slideTrack.detach(),
                    n.$list.detach(),
                    n.$slider.append(n.$slides)),
                    n.cleanUpRows(),
                    n.$slider.removeClass("slick-slider"),
                    n.$slider.removeClass("slick-initialized"),
                    n.$slider.removeClass("slick-dotted"),
                    (n.unslicked = !0),
                t || n.$slider.trigger("destroy", [n]);
            }),
            (t.prototype.disableTransition = function (e) {
                var t = this,
                    n = {};
                (n[t.transitionType] = ""), !1 === t.options.fade ? t.$slideTrack.css(n) : t.$slides.eq(e).css(n);
            }),
            (t.prototype.fadeSlide = function (e, t) {
                var n = this;
                !1 === n.cssTransitions
                    ? (n.$slides.eq(e).css({ zIndex: n.options.zIndex }), n.$slides.eq(e).animate({ opacity: 1 }, n.options.speed, n.options.easing, t))
                    : (n.applyTransition(e),
                        n.$slides.eq(e).css({ opacity: 1, zIndex: n.options.zIndex }),
                    t &&
                    setTimeout(function () {
                        n.disableTransition(e), t.call();
                    }, n.options.speed));
            }),
            (t.prototype.fadeSlideOut = function (e) {
                var t = this;
                !1 === t.cssTransitions ? t.$slides.eq(e).animate({ opacity: 0, zIndex: t.options.zIndex - 2 }, t.options.speed, t.options.easing) : (t.applyTransition(e), t.$slides.eq(e).css({ opacity: 0, zIndex: t.options.zIndex - 2 }));
            }),
            (t.prototype.filterSlides = t.prototype.slickFilter = function (e) {
                var t = this;
                null !== e && ((t.$slidesCache = t.$slides), t.unload(), t.$slideTrack.children(this.options.slide).detach(), t.$slidesCache.filter(e).appendTo(t.$slideTrack), t.reinit());
            }),
            (t.prototype.focusHandler = function () {
                var t = this;
                t.$slider.off("focus.slick blur.slick").on("focus.slick blur.slick", "*", function (n) {
                    n.stopImmediatePropagation();
                    var i = e(this);
                    setTimeout(function () {
                        t.options.pauseOnFocus && ((t.focussed = i.is(":focus")), t.autoPlay());
                    }, 0);
                });
            }),
            (t.prototype.getCurrent = t.prototype.slickCurrentSlide = function () {
                return this.currentSlide;
            }),
            (t.prototype.getDotCount = function () {
                var e = this,
                    t = 0,
                    n = 0,
                    i = 0;
                if (!0 === e.options.infinite)
                    if (e.slideCount <= e.options.slidesToShow) ++i;
                    else for (; t < e.slideCount; ) ++i, (t = n + e.options.slidesToScroll), (n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow);
                else if (!0 === e.options.centerMode) i = e.slideCount;
                else if (e.options.asNavFor) for (; t < e.slideCount; ) ++i, (t = n + e.options.slidesToScroll), (n += e.options.slidesToScroll <= e.options.slidesToShow ? e.options.slidesToScroll : e.options.slidesToShow);
                else i = 1 + Math.ceil((e.slideCount - e.options.slidesToShow) / e.options.slidesToScroll);
                return i - 1;
            }),
            (t.prototype.getLeft = function (e) {
                var t,
                    n,
                    i,
                    o,
                    s = this,
                    r = 0;
                return (
                    (s.slideOffset = 0),
                        (n = s.$slides.first().outerHeight(!0)),
                        !0 === s.options.infinite
                            ? (s.slideCount > s.options.slidesToShow &&
                            ((s.slideOffset = s.slideWidth * s.options.slidesToShow * -1),
                                (o = -1),
                            !0 === s.options.vertical && !0 === s.options.centerMode && (2 === s.options.slidesToShow ? (o = -1.5) : 1 === s.options.slidesToShow && (o = -2)),
                                (r = n * s.options.slidesToShow * o)),
                            s.slideCount % s.options.slidesToScroll != 0 &&
                            e + s.options.slidesToScroll > s.slideCount &&
                            s.slideCount > s.options.slidesToShow &&
                            (e > s.slideCount
                                ? ((s.slideOffset = (s.options.slidesToShow - (e - s.slideCount)) * s.slideWidth * -1), (r = (s.options.slidesToShow - (e - s.slideCount)) * n * -1))
                                : ((s.slideOffset = (s.slideCount % s.options.slidesToScroll) * s.slideWidth * -1), (r = (s.slideCount % s.options.slidesToScroll) * n * -1))))
                            : e + s.options.slidesToShow > s.slideCount && ((s.slideOffset = (e + s.options.slidesToShow - s.slideCount) * s.slideWidth), (r = (e + s.options.slidesToShow - s.slideCount) * n)),
                    s.slideCount <= s.options.slidesToShow && ((s.slideOffset = 0), (r = 0)),
                        !0 === s.options.centerMode && s.slideCount <= s.options.slidesToShow
                            ? (s.slideOffset = (s.slideWidth * Math.floor(s.options.slidesToShow)) / 2 - (s.slideWidth * s.slideCount) / 2)
                            : !0 === s.options.centerMode && !0 === s.options.infinite
                                ? (s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2) - s.slideWidth)
                                : !0 === s.options.centerMode && ((s.slideOffset = 0), (s.slideOffset += s.slideWidth * Math.floor(s.options.slidesToShow / 2))),
                        (t = !1 === s.options.vertical ? e * s.slideWidth * -1 + s.slideOffset : e * n * -1 + r),
                    !0 === s.options.variableWidth &&
                    ((i = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(e) : s.$slideTrack.children(".slick-slide").eq(e + s.options.slidesToShow)),
                        (t = !0 === s.options.rtl ? (i[0] ? -1 * (s.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0) : i[0] ? -1 * i[0].offsetLeft : 0),
                    !0 === s.options.centerMode &&
                    ((i = s.slideCount <= s.options.slidesToShow || !1 === s.options.infinite ? s.$slideTrack.children(".slick-slide").eq(e) : s.$slideTrack.children(".slick-slide").eq(e + s.options.slidesToShow + 1)),
                        (t = !0 === s.options.rtl ? (i[0] ? -1 * (s.$slideTrack.width() - i[0].offsetLeft - i.width()) : 0) : i[0] ? -1 * i[0].offsetLeft : 0),
                        (t += (s.$list.width() - i.outerWidth()) / 2))),
                        t
                );
            }),
            (t.prototype.getOption = t.prototype.slickGetOption = function (e) {
                return this.options[e];
            }),
            (t.prototype.getNavigableIndexes = function () {
                var e,
                    t = this,
                    n = 0,
                    i = 0,
                    o = [];
                for (!1 === t.options.infinite ? (e = t.slideCount) : ((n = -1 * t.options.slidesToScroll), (i = -1 * t.options.slidesToScroll), (e = 2 * t.slideCount)); n < e; )
                    o.push(n), (n = i + t.options.slidesToScroll), (i += t.options.slidesToScroll <= t.options.slidesToShow ? t.options.slidesToScroll : t.options.slidesToShow);
                return o;
            }),
            (t.prototype.getSlick = function () {
                return this;
            }),
            (t.prototype.getSlideCount = function () {
                var t,
                    n,
                    i = this;
                return (
                    (n = !0 === i.options.centerMode ? i.slideWidth * Math.floor(i.options.slidesToShow / 2) : 0),
                        !0 === i.options.swipeToSlide
                            ? (i.$slideTrack.find(".slick-slide").each(function (o, s) {
                                if (s.offsetLeft - n + e(s).outerWidth() / 2 > -1 * i.swipeLeft) return (t = s), !1;
                            }),
                            Math.abs(e(t).attr("data-slick-index") - i.currentSlide) || 1)
                            : i.options.slidesToScroll
                );
            }),
            (t.prototype.goTo = t.prototype.slickGoTo = function (e, t) {
                this.changeSlide({ data: { message: "index", index: parseInt(e) } }, t);
            }),
            (t.prototype.init = function (t) {
                var n = this;
                e(n.$slider).hasClass("slick-initialized") ||
                (e(n.$slider).addClass("slick-initialized"), n.buildRows(), n.buildOut(), n.setProps(), n.startLoad(), n.loadSlider(), n.initializeEvents(), n.updateArrows(), n.updateDots(), n.checkResponsive(!0), n.focusHandler()),
                t && n.$slider.trigger("init", [n]),
                !0 === n.options.accessibility && n.initADA(),
                n.options.autoplay && ((n.paused = !1), n.autoPlay());
            }),
            (t.prototype.initADA = function () {
                var t = this,
                    n = Math.ceil(t.slideCount / t.options.slidesToShow),
                    i = t.getNavigableIndexes().filter(function (e) {
                        return e >= 0 && e < t.slideCount;
                    });
                t.$slides.add(t.$slideTrack.find(".slick-cloned")).attr({ "aria-hidden": "true", tabindex: "-1" }).find("a, input, button, select").attr({ tabindex: "-1" }),
                null !== t.$dots &&
                (t.$slides.not(t.$slideTrack.find(".slick-cloned")).each(function (n) {
                    var o = i.indexOf(n);
                    e(this).attr({ role: "tabpanel", id: "slick-slide" + t.instanceUid + n, tabindex: -1 }), -1 !== o && e(this).attr({ "aria-describedby": "slick-slide-control" + t.instanceUid + o });
                }),
                    t.$dots
                        .attr("role", "tablist")
                        .find("li")
                        .each(function (o) {
                            var s = i[o];
                            e(this).attr({ role: "presentation" }),
                                e(this)
                                    .find("button")
                                    .first()
                                    .attr({ role: "tab", id: "slick-slide-control" + t.instanceUid + o, "aria-controls": "slick-slide" + t.instanceUid + s, "aria-label": o + 1 + " of " + n, "aria-selected": null, tabindex: "-1" });
                        })
                        .eq(t.currentSlide)
                        .find("button")
                        .attr({ "aria-selected": "true", tabindex: "0" })
                        .end());
                for (var o = t.currentSlide, s = o + t.options.slidesToShow; o < s; o++) t.$slides.eq(o).attr("tabindex", 0);
                t.activateADA();
            }),
            (t.prototype.initArrowEvents = function () {
                var e = this;
                !0 === e.options.arrows &&
                e.slideCount > e.options.slidesToShow &&
                (e.$prevArrow.off("click.slick").on("click.slick", { message: "previous" }, e.changeSlide),
                    e.$nextArrow.off("click.slick").on("click.slick", { message: "next" }, e.changeSlide),
                !0 === e.options.accessibility && (e.$prevArrow.on("keydown.slick", e.keyHandler), e.$nextArrow.on("keydown.slick", e.keyHandler)));
            }),
            (t.prototype.initDotEvents = function () {
                var t = this;
                !0 === t.options.dots && (e("li", t.$dots).on("click.slick", { message: "index" }, t.changeSlide), !0 === t.options.accessibility && t.$dots.on("keydown.slick", t.keyHandler)),
                !0 === t.options.dots && !0 === t.options.pauseOnDotsHover && e("li", t.$dots).on("mouseenter.slick", e.proxy(t.interrupt, t, !0)).on("mouseleave.slick", e.proxy(t.interrupt, t, !1));
            }),
            (t.prototype.initSlideEvents = function () {
                var t = this;
                t.options.pauseOnHover && (t.$list.on("mouseenter.slick", e.proxy(t.interrupt, t, !0)), t.$list.on("mouseleave.slick", e.proxy(t.interrupt, t, !1)));
            }),
            (t.prototype.initializeEvents = function () {
                var t = this;
                t.initArrowEvents(),
                    t.initDotEvents(),
                    t.initSlideEvents(),
                    t.$list.on("touchstart.slick mousedown.slick", { action: "start" }, t.swipeHandler),
                    t.$list.on("touchmove.slick mousemove.slick", { action: "move" }, t.swipeHandler),
                    t.$list.on("touchend.slick mouseup.slick", { action: "end" }, t.swipeHandler),
                    t.$list.on("touchcancel.slick mouseleave.slick", { action: "end" }, t.swipeHandler),
                    t.$list.on("click.slick", t.clickHandler),
                    e(document).on(t.visibilityChange, e.proxy(t.visibility, t)),
                !0 === t.options.accessibility && t.$list.on("keydown.slick", t.keyHandler),
                !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler),
                    e(window).on("orientationchange.slick.slick-" + t.instanceUid, e.proxy(t.orientationChange, t)),
                    e(window).on("resize.slick.slick-" + t.instanceUid, e.proxy(t.resize, t)),
                    e("[draggable!=true]", t.$slideTrack).on("dragstart", t.preventDefault),
                    e(window).on("load.slick.slick-" + t.instanceUid, t.setPosition),
                    e(t.setPosition);
            }),
            (t.prototype.initUI = function () {
                var e = this;
                !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.show(), e.$nextArrow.show()), !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.show();
            }),
            (t.prototype.keyHandler = function (e) {
                var t = this;
                e.target.tagName.match("TEXTAREA|INPUT|SELECT") ||
                (37 === e.keyCode && !0 === t.options.accessibility
                    ? t.changeSlide({ data: { message: !0 === t.options.rtl ? "next" : "previous" } })
                    : 39 === e.keyCode && !0 === t.options.accessibility && t.changeSlide({ data: { message: !0 === t.options.rtl ? "previous" : "next" } }));
            }),
            (t.prototype.lazyLoad = function () {
                function t(t) {
                    e("img[data-lazy]", t).each(function () {
                        var t = e(this),
                            n = e(this).attr("data-lazy"),
                            i = e(this).attr("data-srcset"),
                            o = e(this).attr("data-sizes") || s.$slider.attr("data-sizes"),
                            r = document.createElement("img");
                        (r.onload = function () {
                            t.animate({ opacity: 0 }, 100, function () {
                                i && (t.attr("srcset", i), o && t.attr("sizes", o)),
                                    t.attr("src", n).animate({ opacity: 1 }, 200, function () {
                                        t.removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading");
                                    }),
                                    s.$slider.trigger("lazyLoaded", [s, t, n]);
                            });
                        }),
                            (r.onerror = function () {
                                t.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), s.$slider.trigger("lazyLoadError", [s, t, n]);
                            }),
                            (r.src = n);
                    });
                }
                var n,
                    i,
                    o,
                    s = this;
                if (
                    (!0 === s.options.centerMode
                        ? !0 === s.options.infinite
                            ? (o = (i = s.currentSlide + (s.options.slidesToShow / 2 + 1)) + s.options.slidesToShow + 2)
                            : ((i = Math.max(0, s.currentSlide - (s.options.slidesToShow / 2 + 1))), (o = s.options.slidesToShow / 2 + 1 + 2 + s.currentSlide))
                        : ((i = s.options.infinite ? s.options.slidesToShow + s.currentSlide : s.currentSlide), (o = Math.ceil(i + s.options.slidesToShow)), !0 === s.options.fade && (i > 0 && i--, o <= s.slideCount && o++)),
                        (n = s.$slider.find(".slick-slide").slice(i, o)),
                    "anticipated" === s.options.lazyLoad)
                )
                    for (var r = i - 1, a = o, l = s.$slider.find(".slick-slide"), c = 0; c < s.options.slidesToScroll; c++) r < 0 && (r = s.slideCount - 1), (n = (n = n.add(l.eq(r))).add(l.eq(a))), r--, a++;
                t(n),
                    s.slideCount <= s.options.slidesToShow
                        ? t(s.$slider.find(".slick-slide"))
                        : s.currentSlide >= s.slideCount - s.options.slidesToShow
                            ? t(s.$slider.find(".slick-cloned").slice(0, s.options.slidesToShow))
                            : 0 === s.currentSlide && t(s.$slider.find(".slick-cloned").slice(-1 * s.options.slidesToShow));
            }),
            (t.prototype.loadSlider = function () {
                var e = this;
                e.setPosition(), e.$slideTrack.css({ opacity: 1 }), e.$slider.removeClass("slick-loading"), e.initUI(), "progressive" === e.options.lazyLoad && e.progressiveLazyLoad();
            }),
            (t.prototype.next = t.prototype.slickNext = function () {
                this.changeSlide({ data: { message: "next" } });
            }),
            (t.prototype.orientationChange = function () {
                this.checkResponsive(), this.setPosition();
            }),
            (t.prototype.pause = t.prototype.slickPause = function () {
                this.autoPlayClear(), (this.paused = !0);
            }),
            (t.prototype.play = t.prototype.slickPlay = function () {
                var e = this;
                e.autoPlay(), (e.options.autoplay = !0), (e.paused = !1), (e.focussed = !1), (e.interrupted = !1);
            }),
            (t.prototype.postSlide = function (t) {
                var n = this;
                n.unslicked ||
                (n.$slider.trigger("afterChange", [n, t]),
                    (n.animating = !1),
                n.slideCount > n.options.slidesToShow && n.setPosition(),
                    (n.swipeLeft = null),
                n.options.autoplay && n.autoPlay(),
                !0 === n.options.accessibility && (n.initADA(), n.options.focusOnChange && e(n.$slides.get(n.currentSlide)).attr("tabindex", 0).focus()));
            }),
            (t.prototype.prev = t.prototype.slickPrev = function () {
                this.changeSlide({ data: { message: "previous" } });
            }),
            (t.prototype.preventDefault = function (e) {
                e.preventDefault();
            }),
            (t.prototype.progressiveLazyLoad = function (t) {
                t = t || 1;
                var n,
                    i,
                    o,
                    s,
                    r,
                    a = this,
                    l = e("img[data-lazy]", a.$slider);
                l.length
                    ? ((n = l.first()),
                        (i = n.attr("data-lazy")),
                        (o = n.attr("data-srcset")),
                        (s = n.attr("data-sizes") || a.$slider.attr("data-sizes")),
                        ((r = document.createElement("img")).onload = function () {
                            o && (n.attr("srcset", o), s && n.attr("sizes", s)),
                                n.attr("src", i).removeAttr("data-lazy data-srcset data-sizes").removeClass("slick-loading"),
                            !0 === a.options.adaptiveHeight && a.setPosition(),
                                a.$slider.trigger("lazyLoaded", [a, n, i]),
                                a.progressiveLazyLoad();
                        }),
                        (r.onerror = function () {
                            t < 3
                                ? setTimeout(function () {
                                    a.progressiveLazyLoad(t + 1);
                                }, 500)
                                : (n.removeAttr("data-lazy").removeClass("slick-loading").addClass("slick-lazyload-error"), a.$slider.trigger("lazyLoadError", [a, n, i]), a.progressiveLazyLoad());
                        }),
                        (r.src = i))
                    : a.$slider.trigger("allImagesLoaded", [a]);
            }),
            (t.prototype.refresh = function (t) {
                var n,
                    i,
                    o = this;
                (i = o.slideCount - o.options.slidesToShow),
                !o.options.infinite && o.currentSlide > i && (o.currentSlide = i),
                o.slideCount <= o.options.slidesToShow && (o.currentSlide = 0),
                    (n = o.currentSlide),
                    o.destroy(!0),
                    e.extend(o, o.initials, { currentSlide: n }),
                    o.init(),
                t || o.changeSlide({ data: { message: "index", index: n } }, !1);
            }),
            (t.prototype.registerBreakpoints = function () {
                var t,
                    n,
                    i,
                    o = this,
                    s = o.options.responsive || null;
                if ("array" === e.type(s) && s.length) {
                    for (t in ((o.respondTo = o.options.respondTo || "window"), s))
                        if (((i = o.breakpoints.length - 1), s.hasOwnProperty(t))) {
                            for (n = s[t].breakpoint; i >= 0; ) o.breakpoints[i] && o.breakpoints[i] === n && o.breakpoints.splice(i, 1), i--;
                            o.breakpoints.push(n), (o.breakpointSettings[n] = s[t].settings);
                        }
                    o.breakpoints.sort(function (e, t) {
                        return o.options.mobileFirst ? e - t : t - e;
                    });
                }
            }),
            (t.prototype.reinit = function () {
                var t = this;
                (t.$slides = t.$slideTrack.children(t.options.slide).addClass("slick-slide")),
                    (t.slideCount = t.$slides.length),
                t.currentSlide >= t.slideCount && 0 !== t.currentSlide && (t.currentSlide = t.currentSlide - t.options.slidesToScroll),
                t.slideCount <= t.options.slidesToShow && (t.currentSlide = 0),
                    t.registerBreakpoints(),
                    t.setProps(),
                    t.setupInfinite(),
                    t.buildArrows(),
                    t.updateArrows(),
                    t.initArrowEvents(),
                    t.buildDots(),
                    t.updateDots(),
                    t.initDotEvents(),
                    t.cleanUpSlideEvents(),
                    t.initSlideEvents(),
                    t.checkResponsive(!1, !0),
                !0 === t.options.focusOnSelect && e(t.$slideTrack).children().on("click.slick", t.selectHandler),
                    t.setSlideClasses("number" == typeof t.currentSlide ? t.currentSlide : 0),
                    t.setPosition(),
                    t.focusHandler(),
                    (t.paused = !t.options.autoplay),
                    t.autoPlay(),
                    t.$slider.trigger("reInit", [t]);
            }),
            (t.prototype.resize = function () {
                var t = this;
                e(window).width() !== t.windowWidth &&
                (clearTimeout(t.windowDelay),
                    (t.windowDelay = window.setTimeout(function () {
                        (t.windowWidth = e(window).width()), t.checkResponsive(), t.unslicked || t.setPosition();
                    }, 50)));
            }),
            (t.prototype.removeSlide = t.prototype.slickRemove = function (e, t, n) {
                var i = this;
                if (((e = "boolean" == typeof e ? (!0 === (t = e) ? 0 : i.slideCount - 1) : !0 === t ? --e : e), i.slideCount < 1 || e < 0 || e > i.slideCount - 1)) return !1;
                i.unload(),
                    !0 === n ? i.$slideTrack.children().remove() : i.$slideTrack.children(this.options.slide).eq(e).remove(),
                    (i.$slides = i.$slideTrack.children(this.options.slide)),
                    i.$slideTrack.children(this.options.slide).detach(),
                    i.$slideTrack.append(i.$slides),
                    (i.$slidesCache = i.$slides),
                    i.reinit();
            }),
            (t.prototype.setCSS = function (e) {
                var t,
                    n,
                    i = this,
                    o = {};
                !0 === i.options.rtl && (e = -e),
                    (t = "left" == i.positionProp ? Math.ceil(e) + "px" : "0px"),
                    (n = "top" == i.positionProp ? Math.ceil(e) + "px" : "0px"),
                    (o[i.positionProp] = e),
                    !1 === i.transformsEnabled
                        ? i.$slideTrack.css(o)
                        : ((o = {}), !1 === i.cssTransitions ? ((o[i.animType] = "translate(" + t + ", " + n + ")"), i.$slideTrack.css(o)) : ((o[i.animType] = "translate3d(" + t + ", " + n + ", 0px)"), i.$slideTrack.css(o)));
            }),
            (t.prototype.setDimensions = function () {
                var e = this;
                !1 === e.options.vertical
                    ? !0 === e.options.centerMode && e.$list.css({ padding: "0px " + e.options.centerPadding })
                    : (e.$list.height(e.$slides.first().outerHeight(!0) * e.options.slidesToShow), !0 === e.options.centerMode && e.$list.css({ padding: e.options.centerPadding + " 0px" })),
                    (e.listWidth = e.$list.width()),
                    (e.listHeight = e.$list.height()),
                    !1 === e.options.vertical && !1 === e.options.variableWidth
                        ? ((e.slideWidth = Math.ceil(e.listWidth / e.options.slidesToShow)), e.$slideTrack.width(Math.ceil(e.slideWidth * e.$slideTrack.children(".slick-slide").length)))
                        : !0 === e.options.variableWidth
                            ? e.$slideTrack.width(5e3 * e.slideCount)
                            : ((e.slideWidth = Math.ceil(e.listWidth)), e.$slideTrack.height(Math.ceil(e.$slides.first().outerHeight(!0) * e.$slideTrack.children(".slick-slide").length)));
                var t = e.$slides.first().outerWidth(!0) - e.$slides.first().width();
                !1 === e.options.variableWidth && e.$slideTrack.children(".slick-slide").width(e.slideWidth - t);
            }),
            (t.prototype.setFade = function () {
                var t,
                    n = this;
                n.$slides.each(function (i, o) {
                    (t = n.slideWidth * i * -1),
                        !0 === n.options.rtl ? e(o).css({ position: "relative", right: t, top: 0, zIndex: n.options.zIndex - 2, opacity: 0 }) : e(o).css({ position: "relative", left: t, top: 0, zIndex: n.options.zIndex - 2, opacity: 0 });
                }),
                    n.$slides.eq(n.currentSlide).css({ zIndex: n.options.zIndex - 1, opacity: 1 });
            }),
            (t.prototype.setHeight = function () {
                var e = this;
                if (1 === e.options.slidesToShow && !0 === e.options.adaptiveHeight && !1 === e.options.vertical) {
                    var t = e.$slides.eq(e.currentSlide).outerHeight(!0);
                    e.$list.css("height", t);
                }
            }),
            (t.prototype.setOption = t.prototype.slickSetOption = function () {
                var t,
                    n,
                    i,
                    o,
                    s,
                    r = this,
                    a = !1;
                if (
                    ("object" === e.type(arguments[0])
                        ? ((i = arguments[0]), (a = arguments[1]), (s = "multiple"))
                        : "string" === e.type(arguments[0]) &&
                        ((i = arguments[0]), (o = arguments[1]), (a = arguments[2]), "responsive" === arguments[0] && "array" === e.type(arguments[1]) ? (s = "responsive") : void 0 !== arguments[1] && (s = "single")),
                    "single" === s)
                )
                    r.options[i] = o;
                else if ("multiple" === s)
                    e.each(i, function (e, t) {
                        r.options[e] = t;
                    });
                else if ("responsive" === s)
                    for (n in o)
                        if ("array" !== e.type(r.options.responsive)) r.options.responsive = [o[n]];
                        else {
                            for (t = r.options.responsive.length - 1; t >= 0; ) r.options.responsive[t].breakpoint === o[n].breakpoint && r.options.responsive.splice(t, 1), t--;
                            r.options.responsive.push(o[n]);
                        }
                a && (r.unload(), r.reinit());
            }),
            (t.prototype.setPosition = function () {
                var e = this;
                e.setDimensions(), e.setHeight(), !1 === e.options.fade ? e.setCSS(e.getLeft(e.currentSlide)) : e.setFade(), e.$slider.trigger("setPosition", [e]);
            }),
            (t.prototype.setProps = function () {
                var e = this,
                    t = document.body.style;
                (e.positionProp = !0 === e.options.vertical ? "top" : "left"),
                    "top" === e.positionProp ? e.$slider.addClass("slick-vertical") : e.$slider.removeClass("slick-vertical"),
                (void 0 === t.WebkitTransition && void 0 === t.MozTransition && void 0 === t.msTransition) || (!0 === e.options.useCSS && (e.cssTransitions = !0)),
                e.options.fade && ("number" == typeof e.options.zIndex ? e.options.zIndex < 3 && (e.options.zIndex = 3) : (e.options.zIndex = e.defaults.zIndex)),
                void 0 !== t.OTransform && ((e.animType = "OTransform"), (e.transformType = "-o-transform"), (e.transitionType = "OTransition"), void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)),
                void 0 !== t.MozTransform &&
                ((e.animType = "MozTransform"), (e.transformType = "-moz-transform"), (e.transitionType = "MozTransition"), void 0 === t.perspectiveProperty && void 0 === t.MozPerspective && (e.animType = !1)),
                void 0 !== t.webkitTransform &&
                ((e.animType = "webkitTransform"), (e.transformType = "-webkit-transform"), (e.transitionType = "webkitTransition"), void 0 === t.perspectiveProperty && void 0 === t.webkitPerspective && (e.animType = !1)),
                void 0 !== t.msTransform && ((e.animType = "msTransform"), (e.transformType = "-ms-transform"), (e.transitionType = "msTransition"), void 0 === t.msTransform && (e.animType = !1)),
                void 0 !== t.transform && !1 !== e.animType && ((e.animType = "transform"), (e.transformType = "transform"), (e.transitionType = "transition")),
                    (e.transformsEnabled = e.options.useTransform && null !== e.animType && !1 !== e.animType);
            }),
            (t.prototype.setSlideClasses = function (e) {
                var t,
                    n,
                    i,
                    o,
                    s = this;
                if (((n = s.$slider.find(".slick-slide").removeClass("slick-active slick-center slick-current").attr("aria-hidden", "true")), s.$slides.eq(e).addClass("slick-current"), !0 === s.options.centerMode)) {
                    var r = s.options.slidesToShow % 2 == 0 ? 1 : 0;
                    (t = Math.floor(s.options.slidesToShow / 2)),
                    !0 === s.options.infinite &&
                    (e >= t && e <= s.slideCount - 1 - t
                        ? s.$slides
                            .slice(e - t + r, e + t + 1)
                            .addClass("slick-active")
                            .attr("aria-hidden", "false")
                        : ((i = s.options.slidesToShow + e),
                            n
                                .slice(i - t + 1 + r, i + t + 2)
                                .addClass("slick-active")
                                .attr("aria-hidden", "false")),
                        0 === e ? n.eq(n.length - 1 - s.options.slidesToShow).addClass("slick-center") : e === s.slideCount - 1 && n.eq(s.options.slidesToShow).addClass("slick-center")),
                        s.$slides.eq(e).addClass("slick-center");
                } else
                    e >= 0 && e <= s.slideCount - s.options.slidesToShow
                        ? s.$slides
                            .slice(e, e + s.options.slidesToShow)
                            .addClass("slick-active")
                            .attr("aria-hidden", "false")
                        : n.length <= s.options.slidesToShow
                            ? n.addClass("slick-active").attr("aria-hidden", "false")
                            : ((o = s.slideCount % s.options.slidesToShow),
                                (i = !0 === s.options.infinite ? s.options.slidesToShow + e : e),
                                s.options.slidesToShow == s.options.slidesToScroll && s.slideCount - e < s.options.slidesToShow
                                    ? n
                                        .slice(i - (s.options.slidesToShow - o), i + o)
                                        .addClass("slick-active")
                                        .attr("aria-hidden", "false")
                                    : n
                                        .slice(i, i + s.options.slidesToShow)
                                        .addClass("slick-active")
                                        .attr("aria-hidden", "false"));
                ("ondemand" !== s.options.lazyLoad && "anticipated" !== s.options.lazyLoad) || s.lazyLoad();
            }),
            (t.prototype.setupInfinite = function () {
                var t,
                    n,
                    i,
                    o = this;
                if ((!0 === o.options.fade && (o.options.centerMode = !1), !0 === o.options.infinite && !1 === o.options.fade && ((n = null), o.slideCount > o.options.slidesToShow))) {
                    for (i = !0 === o.options.centerMode ? o.options.slidesToShow + 1 : o.options.slidesToShow, t = o.slideCount; t > o.slideCount - i; t -= 1)
                        (n = t - 1),
                            e(o.$slides[n])
                                .clone(!0)
                                .attr("id", "")
                                .attr("data-slick-index", n - o.slideCount)
                                .prependTo(o.$slideTrack)
                                .addClass("slick-cloned");
                    for (t = 0; t < i + o.slideCount; t += 1)
                        (n = t),
                            e(o.$slides[n])
                                .clone(!0)
                                .attr("id", "")
                                .attr("data-slick-index", n + o.slideCount)
                                .appendTo(o.$slideTrack)
                                .addClass("slick-cloned");
                    o.$slideTrack
                        .find(".slick-cloned")
                        .find("[id]")
                        .each(function () {
                            e(this).attr("id", "");
                        });
                }
            }),
            (t.prototype.interrupt = function (e) {
                e || this.autoPlay(), (this.interrupted = e);
            }),
            (t.prototype.selectHandler = function (t) {
                var n = this,
                    i = e(t.target).is(".slick-slide") ? e(t.target) : e(t.target).parents(".slick-slide"),
                    o = parseInt(i.attr("data-slick-index"));
                o || (o = 0), n.slideCount <= n.options.slidesToShow ? n.slideHandler(o, !1, !0) : n.slideHandler(o);
            }),
            (t.prototype.slideHandler = function (e, t, n) {
                var i,
                    o,
                    s,
                    r,
                    a,
                    l = null,
                    c = this;
                if (((t = t || !1), !((!0 === c.animating && !0 === c.options.waitForAnimate) || (!0 === c.options.fade && c.currentSlide === e))))
                    if (
                        (!1 === t && c.asNavFor(e),
                            (i = e),
                            (l = c.getLeft(i)),
                            (r = c.getLeft(c.currentSlide)),
                            (c.currentLeft = null === c.swipeLeft ? r : c.swipeLeft),
                        !1 === c.options.infinite && !1 === c.options.centerMode && (e < 0 || e > c.getDotCount() * c.options.slidesToScroll))
                    )
                        !1 === c.options.fade &&
                        ((i = c.currentSlide),
                            !0 !== n
                                ? c.animateSlide(r, function () {
                                    c.postSlide(i);
                                })
                                : c.postSlide(i));
                    else if (!1 === c.options.infinite && !0 === c.options.centerMode && (e < 0 || e > c.slideCount - c.options.slidesToScroll))
                        !1 === c.options.fade &&
                        ((i = c.currentSlide),
                            !0 !== n
                                ? c.animateSlide(r, function () {
                                    c.postSlide(i);
                                })
                                : c.postSlide(i));
                    else {
                        if (
                            (c.options.autoplay && clearInterval(c.autoPlayTimer),
                                (o =
                                    i < 0
                                        ? c.slideCount % c.options.slidesToScroll != 0
                                            ? c.slideCount - (c.slideCount % c.options.slidesToScroll)
                                            : c.slideCount + i
                                        : i >= c.slideCount
                                            ? c.slideCount % c.options.slidesToScroll != 0
                                                ? 0
                                                : i - c.slideCount
                                            : i),
                                (c.animating = !0),
                                c.$slider.trigger("beforeChange", [c, c.currentSlide, o]),
                                (s = c.currentSlide),
                                (c.currentSlide = o),
                                c.setSlideClasses(c.currentSlide),
                            c.options.asNavFor && (a = (a = c.getNavTarget()).slick("getSlick")).slideCount <= a.options.slidesToShow && a.setSlideClasses(c.currentSlide),
                                c.updateDots(),
                                c.updateArrows(),
                            !0 === c.options.fade)
                        )
                            return (
                                !0 !== n
                                    ? (c.fadeSlideOut(s),
                                        c.fadeSlide(o, function () {
                                            c.postSlide(o);
                                        }))
                                    : c.postSlide(o),
                                    void c.animateHeight()
                            );
                        !0 !== n
                            ? c.animateSlide(l, function () {
                                c.postSlide(o);
                            })
                            : c.postSlide(o);
                    }
            }),
            (t.prototype.startLoad = function () {
                var e = this;
                !0 === e.options.arrows && e.slideCount > e.options.slidesToShow && (e.$prevArrow.hide(), e.$nextArrow.hide()),
                !0 === e.options.dots && e.slideCount > e.options.slidesToShow && e.$dots.hide(),
                    e.$slider.addClass("slick-loading");
            }),
            (t.prototype.swipeDirection = function () {
                var e,
                    t,
                    n,
                    i,
                    o = this;
                return (
                    (e = o.touchObject.startX - o.touchObject.curX),
                        (t = o.touchObject.startY - o.touchObject.curY),
                        (n = Math.atan2(t, e)),
                    (i = Math.round((180 * n) / Math.PI)) < 0 && (i = 360 - Math.abs(i)),
                        i <= 45 && i >= 0
                            ? !1 === o.options.rtl
                                ? "left"
                                : "right"
                            : i <= 360 && i >= 315
                                ? !1 === o.options.rtl
                                    ? "left"
                                    : "right"
                                : i >= 135 && i <= 225
                                    ? !1 === o.options.rtl
                                        ? "right"
                                        : "left"
                                    : !0 === o.options.verticalSwiping
                                        ? i >= 35 && i <= 135
                                            ? "down"
                                            : "up"
                                        : "vertical"
                );
            }),
            (t.prototype.swipeEnd = function (e) {
                var t,
                    n,
                    i = this;
                if (((i.dragging = !1), (i.swiping = !1), i.scrolling)) return (i.scrolling = !1), !1;
                if (((i.interrupted = !1), (i.shouldClick = !(i.touchObject.swipeLength > 10)), void 0 === i.touchObject.curX)) return !1;
                if ((!0 === i.touchObject.edgeHit && i.$slider.trigger("edge", [i, i.swipeDirection()]), i.touchObject.swipeLength >= i.touchObject.minSwipe)) {
                    switch ((n = i.swipeDirection())) {
                        case "left":
                        case "down":
                            (t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide + i.getSlideCount()) : i.currentSlide + i.getSlideCount()), (i.currentDirection = 0);
                            break;
                        case "right":
                        case "up":
                            (t = i.options.swipeToSlide ? i.checkNavigable(i.currentSlide - i.getSlideCount()) : i.currentSlide - i.getSlideCount()), (i.currentDirection = 1);
                    }
                    "vertical" != n && (i.slideHandler(t), (i.touchObject = {}), i.$slider.trigger("swipe", [i, n]));
                } else i.touchObject.startX !== i.touchObject.curX && (i.slideHandler(i.currentSlide), (i.touchObject = {}));
            }),
            (t.prototype.swipeHandler = function (e) {
                var t = this;
                if (!(!1 === t.options.swipe || ("ontouchend" in document && !1 === t.options.swipe) || (!1 === t.options.draggable && -1 !== e.type.indexOf("mouse"))))
                    switch (
                        ((t.touchObject.fingerCount = e.originalEvent && void 0 !== e.originalEvent.touches ? e.originalEvent.touches.length : 1),
                            (t.touchObject.minSwipe = t.listWidth / t.options.touchThreshold),
                        !0 === t.options.verticalSwiping && (t.touchObject.minSwipe = t.listHeight / t.options.touchThreshold),
                            e.data.action)
                        ) {
                        case "start":
                            t.swipeStart(e);
                            break;
                        case "move":
                            t.swipeMove(e);
                            break;
                        case "end":
                            t.swipeEnd(e);
                    }
            }),
            (t.prototype.swipeMove = function (e) {
                var t,
                    n,
                    i,
                    o,
                    s,
                    r,
                    a = this;
                return (
                    (s = void 0 !== e.originalEvent ? e.originalEvent.touches : null),
                    !(!a.dragging || a.scrolling || (s && 1 !== s.length)) &&
                    ((t = a.getLeft(a.currentSlide)),
                        (a.touchObject.curX = void 0 !== s ? s[0].pageX : e.clientX),
                        (a.touchObject.curY = void 0 !== s ? s[0].pageY : e.clientY),
                        (a.touchObject.swipeLength = Math.round(Math.sqrt(Math.pow(a.touchObject.curX - a.touchObject.startX, 2)))),
                        (r = Math.round(Math.sqrt(Math.pow(a.touchObject.curY - a.touchObject.startY, 2)))),
                        !a.options.verticalSwiping && !a.swiping && r > 4
                            ? ((a.scrolling = !0), !1)
                            : (!0 === a.options.verticalSwiping && (a.touchObject.swipeLength = r),
                                (n = a.swipeDirection()),
                            void 0 !== e.originalEvent && a.touchObject.swipeLength > 4 && ((a.swiping = !0), e.preventDefault()),
                                (o = (!1 === a.options.rtl ? 1 : -1) * (a.touchObject.curX > a.touchObject.startX ? 1 : -1)),
                            !0 === a.options.verticalSwiping && (o = a.touchObject.curY > a.touchObject.startY ? 1 : -1),
                                (i = a.touchObject.swipeLength),
                                (a.touchObject.edgeHit = !1),
                            !1 === a.options.infinite &&
                            ((0 === a.currentSlide && "right" === n) || (a.currentSlide >= a.getDotCount() && "left" === n)) &&
                            ((i = a.touchObject.swipeLength * a.options.edgeFriction), (a.touchObject.edgeHit = !0)),
                                !1 === a.options.vertical ? (a.swipeLeft = t + i * o) : (a.swipeLeft = t + i * (a.$list.height() / a.listWidth) * o),
                            !0 === a.options.verticalSwiping && (a.swipeLeft = t + i * o),
                            !0 !== a.options.fade && !1 !== a.options.touchMove && (!0 === a.animating ? ((a.swipeLeft = null), !1) : void a.setCSS(a.swipeLeft))))
                );
            }),
            (t.prototype.swipeStart = function (e) {
                var t,
                    n = this;
                if (((n.interrupted = !0), 1 !== n.touchObject.fingerCount || n.slideCount <= n.options.slidesToShow)) return (n.touchObject = {}), !1;
                void 0 !== e.originalEvent && void 0 !== e.originalEvent.touches && (t = e.originalEvent.touches[0]),
                    (n.touchObject.startX = n.touchObject.curX = void 0 !== t ? t.pageX : e.clientX),
                    (n.touchObject.startY = n.touchObject.curY = void 0 !== t ? t.pageY : e.clientY),
                    (n.dragging = !0);
            }),
            (t.prototype.unfilterSlides = t.prototype.slickUnfilter = function () {
                var e = this;
                null !== e.$slidesCache && (e.unload(), e.$slideTrack.children(this.options.slide).detach(), e.$slidesCache.appendTo(e.$slideTrack), e.reinit());
            }),
            (t.prototype.unload = function () {
                var t = this;
                e(".slick-cloned", t.$slider).remove(),
                t.$dots && t.$dots.remove(),
                t.$prevArrow && t.htmlExpr.test(t.options.prevArrow) && t.$prevArrow.remove(),
                t.$nextArrow && t.htmlExpr.test(t.options.nextArrow) && t.$nextArrow.remove(),
                    t.$slides.removeClass("slick-slide slick-active slick-visible slick-current").attr("aria-hidden", "true").css("width", "");
            }),
            (t.prototype.unslick = function (e) {
                var t = this;
                t.$slider.trigger("unslick", [t, e]), t.destroy();
            }),
            (t.prototype.updateArrows = function () {
                var e = this;
                Math.floor(e.options.slidesToShow / 2),
                !0 === e.options.arrows &&
                e.slideCount > e.options.slidesToShow &&
                !e.options.infinite &&
                (e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                    e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"),
                    0 === e.currentSlide
                        ? (e.$prevArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$nextArrow.removeClass("slick-disabled").attr("aria-disabled", "false"))
                        : e.currentSlide >= e.slideCount - e.options.slidesToShow && !1 === e.options.centerMode
                            ? (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false"))
                            : e.currentSlide >= e.slideCount - 1 &&
                            !0 === e.options.centerMode &&
                            (e.$nextArrow.addClass("slick-disabled").attr("aria-disabled", "true"), e.$prevArrow.removeClass("slick-disabled").attr("aria-disabled", "false")));
            }),
            (t.prototype.updateDots = function () {
                var e = this;
                null !== e.$dots &&
                (e.$dots.find("li").removeClass("slick-active").end(),
                    e.$dots
                        .find("li")
                        .eq(Math.floor(e.currentSlide / e.options.slidesToScroll))
                        .addClass("slick-active"));
            }),
            (t.prototype.visibility = function () {
                var e = this;
                e.options.autoplay && (document[e.hidden] ? (e.interrupted = !0) : (e.interrupted = !1));
            }),
            (e.fn.slick = function () {
                var e,
                    n,
                    i = this,
                    o = arguments[0],
                    s = Array.prototype.slice.call(arguments, 1),
                    r = i.length;
                for (e = 0; e < r; e++) if (("object" == typeof o || void 0 === o ? (i[e].slick = new t(i[e], o)) : (n = i[e].slick[o].apply(i[e].slick, s)), void 0 !== n)) return n;
                return i;
            });
    }),
    (function (e, t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define("jquery-bridget/jquery-bridget", ["jquery"], function (n) {
                t(e, n);
            })
            : "object" == typeof module && module.exports
                ? (module.exports = t(e, require("jquery")))
                : (e.jQueryBridget = t(e, e.jQuery));
    })(window, function (e, t) {
        "use strict";
        function n(n, s, a) {
            (a = a || t || e.jQuery) &&
            (s.prototype.option ||
            (s.prototype.option = function (e) {
                a.isPlainObject(e) && (this.options = a.extend(!0, this.options, e));
            }),
                (a.fn[n] = function (e) {
                    return "string" == typeof e
                        ? (function (e, t, i) {
                            var o,
                                s = "$()." + n + '("' + t + '")';
                            return (
                                e.each(function (e, l) {
                                    var c = a.data(l, n);
                                    if (c) {
                                        var d = c[t];
                                        if (d && "_" != t.charAt(0)) {
                                            var u = d.apply(c, i);
                                            o = void 0 === o ? u : o;
                                        } else r(s + " is not a valid method");
                                    } else r(n + " not initialized. Cannot call methods, i.e. " + s);
                                }),
                                    void 0 !== o ? o : e
                            );
                        })(this, e, o.call(arguments, 1))
                        : ((function (e, t) {
                            e.each(function (e, i) {
                                var o = a.data(i, n);
                                o ? (o.option(t), o._init()) : ((o = new s(i, t)), a.data(i, n, o));
                            });
                        })(this, e),
                            this);
                }),
                i(a));
        }
        function i(e) {
            !e || (e && e.bridget) || (e.bridget = n);
        }
        var o = Array.prototype.slice,
            s = e.console,
            r =
                void 0 === s
                    ? function () {}
                    : function (e) {
                        s.error(e);
                    };
        return i(t || e.jQuery), n;
    }),
    (function (e, t) {
        "function" == typeof define && define.amd ? define("ev-emitter/ev-emitter", t) : "object" == typeof module && module.exports ? (module.exports = t()) : (e.EvEmitter = t());
    })("undefined" != typeof window ? window : this, function () {
        function e() {}
        var t = e.prototype;
        return (
            (t.on = function (e, t) {
                if (e && t) {
                    var n = (this._events = this._events || {}),
                        i = (n[e] = n[e] || []);
                    return -1 == i.indexOf(t) && i.push(t), this;
                }
            }),
                (t.once = function (e, t) {
                    if (e && t) {
                        this.on(e, t);
                        var n = (this._onceEvents = this._onceEvents || {});
                        return ((n[e] = n[e] || {})[t] = !0), this;
                    }
                }),
                (t.off = function (e, t) {
                    var n = this._events && this._events[e];
                    if (n && n.length) {
                        var i = n.indexOf(t);
                        return -1 != i && n.splice(i, 1), this;
                    }
                }),
                (t.emitEvent = function (e, t) {
                    var n = this._events && this._events[e];
                    if (n && n.length) {
                        var i = 0,
                            o = n[i];
                        t = t || [];
                        for (var s = this._onceEvents && this._onceEvents[e]; o; ) {
                            var r = s && s[o];
                            r && (this.off(e, o), delete s[o]), o.apply(this, t), (o = n[(i += r ? 0 : 1)]);
                        }
                        return this;
                    }
                }),
                e
        );
    }),
    (function (e, t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define("get-size/get-size", [], function () {
                return t();
            })
            : "object" == typeof module && module.exports
                ? (module.exports = t())
                : (e.getSize = t());
    })(window, function () {
        "use strict";
        function e(e) {
            var t = parseFloat(e);
            return -1 == e.indexOf("%") && !isNaN(t) && t;
        }
        function t(e) {
            var t = getComputedStyle(e);
            return t || s("Style returned " + t + ". Are you running this code in a hidden iframe on Firefox? See http://bit.ly/getsizebug1"), t;
        }
        function n() {
            if (!l) {
                l = !0;
                var n = document.createElement("div");
                (n.style.width = "200px"), (n.style.padding = "1px 2px 3px 4px"), (n.style.borderStyle = "solid"), (n.style.borderWidth = "1px 2px 3px 4px"), (n.style.boxSizing = "border-box");
                var s = document.body || document.documentElement;
                s.appendChild(n);
                var r = t(n);
                (i.isBoxSizeOuter = o = 200 == e(r.width)), s.removeChild(n);
            }
        }
        function i(i) {
            if ((n(), "string" == typeof i && (i = document.querySelector(i)), i && "object" == typeof i && i.nodeType)) {
                var s = t(i);
                if ("none" == s.display)
                    return (function () {
                        for (var e = { width: 0, height: 0, innerWidth: 0, innerHeight: 0, outerWidth: 0, outerHeight: 0 }, t = 0; a > t; t++) e[r[t]] = 0;
                        return e;
                    })();
                var l = {};
                (l.width = i.offsetWidth), (l.height = i.offsetHeight);
                for (var c = (l.isBorderBox = "border-box" == s.boxSizing), d = 0; a > d; d++) {
                    var u = r[d],
                        h = s[u],
                        p = parseFloat(h);
                    l[u] = isNaN(p) ? 0 : p;
                }
                var f = l.paddingLeft + l.paddingRight,
                    m = l.paddingTop + l.paddingBottom,
                    g = l.marginLeft + l.marginRight,
                    v = l.marginTop + l.marginBottom,
                    y = l.borderLeftWidth + l.borderRightWidth,
                    b = l.borderTopWidth + l.borderBottomWidth,
                    w = c && o,
                    _ = e(s.width);
                !1 !== _ && (l.width = _ + (w ? 0 : f + y));
                var S = e(s.height);
                return !1 !== S && (l.height = S + (w ? 0 : m + b)), (l.innerWidth = l.width - (f + y)), (l.innerHeight = l.height - (m + b)), (l.outerWidth = l.width + g), (l.outerHeight = l.height + v), l;
            }
        }
        var o,
            s =
                "undefined" == typeof console
                    ? function () {}
                    : function (e) {
                        console.error(e);
                    },
            r = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"],
            a = r.length,
            l = !1;
        return i;
    }),
    (function (e, t) {
        "use strict";
        "function" == typeof define && define.amd ? define("desandro-matches-selector/matches-selector", t) : "object" == typeof module && module.exports ? (module.exports = t()) : (e.matchesSelector = t());
    })(window, function () {
        "use strict";
        var e = (function () {
            var e = Element.prototype;
            if (e.matches) return "matches";
            if (e.matchesSelector) return "matchesSelector";
            for (var t = ["webkit", "moz", "ms", "o"], n = 0; n < t.length; n++) {
                var i = t[n] + "MatchesSelector";
                if (e[i]) return i;
            }
        })();
        return function (t, n) {
            return t[e](n);
        };
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("fizzy-ui-utils/utils", ["desandro-matches-selector/matches-selector"], function (n) {
                return t(e, n);
            })
            : "object" == typeof module && module.exports
                ? (module.exports = t(e, require("desandro-matches-selector")))
                : (e.fizzyUIUtils = t(e, e.matchesSelector));
    })(window, function (e, t) {
        var n = {
                extend: function (e, t) {
                    for (var n in t) e[n] = t[n];
                    return e;
                },
                modulo: function (e, t) {
                    return ((e % t) + t) % t;
                },
                makeArray: function (e) {
                    var t = [];
                    if (Array.isArray(e)) t = e;
                    else if (e && "number" == typeof e.length) for (var n = 0; n < e.length; n++) t.push(e[n]);
                    else t.push(e);
                    return t;
                },
                removeFrom: function (e, t) {
                    var n = e.indexOf(t);
                    -1 != n && e.splice(n, 1);
                },
                getParent: function (e, n) {
                    for (; e != document.body; ) if (((e = e.parentNode), t(e, n))) return e;
                },
                getQueryElement: function (e) {
                    return "string" == typeof e ? document.querySelector(e) : e;
                },
                handleEvent: function (e) {
                    var t = "on" + e.type;
                    this[t] && this[t](e);
                },
                filterFindElements: function (e, i) {
                    e = n.makeArray(e);
                    var o = [];
                    return (
                        e.forEach(function (e) {
                            if (e instanceof HTMLElement) {
                                if (!i) return void o.push(e);
                                t(e, i) && o.push(e);
                                for (var n = e.querySelectorAll(i), s = 0; s < n.length; s++) o.push(n[s]);
                            }
                        }),
                            o
                    );
                },
                debounceMethod: function (e, t, n) {
                    var i = e.prototype[t],
                        o = t + "Timeout";
                    e.prototype[t] = function () {
                        var e = this[o];
                        e && clearTimeout(e);
                        var t = arguments,
                            s = this;
                        this[o] = setTimeout(function () {
                            i.apply(s, t), delete s[o];
                        }, n || 100);
                    };
                },
                docReady: function (e) {
                    var t = document.readyState;
                    "complete" == t || "interactive" == t ? e() : document.addEventListener("DOMContentLoaded", e);
                },
                toDashed: function (e) {
                    return e
                        .replace(/(.)([A-Z])/g, function (e, t, n) {
                            return t + "-" + n;
                        })
                        .toLowerCase();
                },
            },
            i = e.console;
        return (
            (n.htmlInit = function (t, o) {
                n.docReady(function () {
                    var s = n.toDashed(o),
                        r = "data-" + s,
                        a = document.querySelectorAll("[" + r + "]"),
                        l = document.querySelectorAll(".js-" + s),
                        c = n.makeArray(a).concat(n.makeArray(l)),
                        d = r + "-options",
                        u = e.jQuery;
                    c.forEach(function (e) {
                        var n,
                            s = e.getAttribute(r) || e.getAttribute(d);
                        try {
                            n = s && JSON.parse(s);
                        } catch (t) {
                            return void (i && i.error("Error parsing " + r + " on " + e.className + ": " + t));
                        }
                        var a = new t(e, n);
                        u && u.data(e, o, a);
                    });
                });
            }),
                n
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("outlayer/item", ["ev-emitter/ev-emitter", "get-size/get-size"], t)
            : "object" == typeof module && module.exports
                ? (module.exports = t(require("ev-emitter"), require("get-size")))
                : ((e.Outlayer = {}), (e.Outlayer.Item = t(e.EvEmitter, e.getSize)));
    })(window, function (e, t) {
        "use strict";
        function n(e, t) {
            e && ((this.element = e), (this.layout = t), (this.position = { x: 0, y: 0 }), this._create());
        }
        var i = document.documentElement.style,
            o = "string" == typeof i.transition ? "transition" : "WebkitTransition",
            s = "string" == typeof i.transform ? "transform" : "WebkitTransform",
            r = { WebkitTransition: "webkitTransitionEnd", transition: "transitionend" }[o],
            a = { transform: s, transition: o, transitionDuration: o + "Duration", transitionProperty: o + "Property", transitionDelay: o + "Delay" },
            l = (n.prototype = Object.create(e.prototype));
        (l.constructor = n),
            (l._create = function () {
                (this._transn = { ingProperties: {}, clean: {}, onEnd: {} }), this.css({ position: "absolute" });
            }),
            (l.handleEvent = function (e) {
                var t = "on" + e.type;
                this[t] && this[t](e);
            }),
            (l.getSize = function () {
                this.size = t(this.element);
            }),
            (l.css = function (e) {
                var t = this.element.style;
                for (var n in e) {
                    t[a[n] || n] = e[n];
                }
            }),
            (l.getPosition = function () {
                var e = getComputedStyle(this.element),
                    t = this.layout._getOption("originLeft"),
                    n = this.layout._getOption("originTop"),
                    i = e[t ? "left" : "right"],
                    o = e[n ? "top" : "bottom"],
                    s = this.layout.size,
                    r = -1 != i.indexOf("%") ? (parseFloat(i) / 100) * s.width : parseInt(i, 10),
                    a = -1 != o.indexOf("%") ? (parseFloat(o) / 100) * s.height : parseInt(o, 10);
                (r = isNaN(r) ? 0 : r), (a = isNaN(a) ? 0 : a), (r -= t ? s.paddingLeft : s.paddingRight), (a -= n ? s.paddingTop : s.paddingBottom), (this.position.x = r), (this.position.y = a);
            }),
            (l.layoutPosition = function () {
                var e = this.layout.size,
                    t = {},
                    n = this.layout._getOption("originLeft"),
                    i = this.layout._getOption("originTop"),
                    o = n ? "paddingLeft" : "paddingRight",
                    s = n ? "left" : "right",
                    r = n ? "right" : "left",
                    a = this.position.x + e[o];
                (t[s] = this.getXValue(a)), (t[r] = "");
                var l = i ? "paddingTop" : "paddingBottom",
                    c = i ? "top" : "bottom",
                    d = i ? "bottom" : "top",
                    u = this.position.y + e[l];
                (t[c] = this.getYValue(u)), (t[d] = ""), this.css(t), this.emitEvent("layout", [this]);
            }),
            (l.getXValue = function (e) {
                var t = this.layout._getOption("horizontal");
                return this.layout.options.percentPosition && !t ? (e / this.layout.size.width) * 100 + "%" : e + "px";
            }),
            (l.getYValue = function (e) {
                var t = this.layout._getOption("horizontal");
                return this.layout.options.percentPosition && t ? (e / this.layout.size.height) * 100 + "%" : e + "px";
            }),
            (l._transitionTo = function (e, t) {
                this.getPosition();
                var n = this.position.x,
                    i = this.position.y,
                    o = parseInt(e, 10),
                    s = parseInt(t, 10),
                    r = o === this.position.x && s === this.position.y;
                if ((this.setPosition(e, t), !r || this.isTransitioning)) {
                    var a = e - n,
                        l = t - i,
                        c = {};
                    (c.transform = this.getTranslate(a, l)), this.transition({ to: c, onTransitionEnd: { transform: this.layoutPosition }, isCleaning: !0 });
                } else this.layoutPosition();
            }),
            (l.getTranslate = function (e, t) {
                return "translate3d(" + (e = this.layout._getOption("originLeft") ? e : -e) + "px, " + (t = this.layout._getOption("originTop") ? t : -t) + "px, 0)";
            }),
            (l.goTo = function (e, t) {
                this.setPosition(e, t), this.layoutPosition();
            }),
            (l.moveTo = l._transitionTo),
            (l.setPosition = function (e, t) {
                (this.position.x = parseInt(e, 10)), (this.position.y = parseInt(t, 10));
            }),
            (l._nonTransition = function (e) {
                for (var t in (this.css(e.to), e.isCleaning && this._removeStyles(e.to), e.onTransitionEnd)) e.onTransitionEnd[t].call(this);
            }),
            (l.transition = function (e) {
                if (parseFloat(this.layout.options.transitionDuration)) {
                    var t = this._transn;
                    for (var n in e.onTransitionEnd) t.onEnd[n] = e.onTransitionEnd[n];
                    for (n in e.to) (t.ingProperties[n] = !0), e.isCleaning && (t.clean[n] = !0);
                    if (e.from) {
                        this.css(e.from);
                        this.element.offsetHeight;
                        null;
                    }
                    this.enableTransition(e.to), this.css(e.to), (this.isTransitioning = !0);
                } else this._nonTransition(e);
            });
        var c =
            "opacity," +
            (function (e) {
                return e.replace(/([A-Z])/g, function (e) {
                    return "-" + e.toLowerCase();
                });
            })(s);
        (l.enableTransition = function () {
            if (!this.isTransitioning) {
                var e = this.layout.options.transitionDuration;
                (e = "number" == typeof e ? e + "ms" : e), this.css({ transitionProperty: c, transitionDuration: e, transitionDelay: this.staggerDelay || 0 }), this.element.addEventListener(r, this, !1);
            }
        }),
            (l.onwebkitTransitionEnd = function (e) {
                this.ontransitionend(e);
            }),
            (l.onotransitionend = function (e) {
                this.ontransitionend(e);
            });
        var d = { "-webkit-transform": "transform" };
        (l.ontransitionend = function (e) {
            if (e.target === this.element) {
                var t = this._transn,
                    n = d[e.propertyName] || e.propertyName;
                if (
                    (delete t.ingProperties[n],
                    (function (e) {
                        for (var t in e) return !1;
                        return !0;
                    })(t.ingProperties) && this.disableTransition(),
                    n in t.clean && ((this.element.style[e.propertyName] = ""), delete t.clean[n]),
                    n in t.onEnd)
                )
                    t.onEnd[n].call(this), delete t.onEnd[n];
                this.emitEvent("transitionEnd", [this]);
            }
        }),
            (l.disableTransition = function () {
                this.removeTransitionStyles(), this.element.removeEventListener(r, this, !1), (this.isTransitioning = !1);
            }),
            (l._removeStyles = function (e) {
                var t = {};
                for (var n in e) t[n] = "";
                this.css(t);
            });
        var u = { transitionProperty: "", transitionDuration: "", transitionDelay: "" };
        return (
            (l.removeTransitionStyles = function () {
                this.css(u);
            }),
                (l.stagger = function (e) {
                    (e = isNaN(e) ? 0 : e), (this.staggerDelay = e + "ms");
                }),
                (l.removeElem = function () {
                    this.element.parentNode.removeChild(this.element), this.css({ display: "" }), this.emitEvent("remove", [this]);
                }),
                (l.remove = function () {
                    return o && parseFloat(this.layout.options.transitionDuration)
                        ? (this.once("transitionEnd", function () {
                            this.removeElem();
                        }),
                            void this.hide())
                        : void this.removeElem();
                }),
                (l.reveal = function () {
                    delete this.isHidden, this.css({ display: "" });
                    var e = this.layout.options,
                        t = {};
                    (t[this.getHideRevealTransitionEndProperty("visibleStyle")] = this.onRevealTransitionEnd), this.transition({ from: e.hiddenStyle, to: e.visibleStyle, isCleaning: !0, onTransitionEnd: t });
                }),
                (l.onRevealTransitionEnd = function () {
                    this.isHidden || this.emitEvent("reveal");
                }),
                (l.getHideRevealTransitionEndProperty = function (e) {
                    var t = this.layout.options[e];
                    if (t.opacity) return "opacity";
                    for (var n in t) return n;
                }),
                (l.hide = function () {
                    (this.isHidden = !0), this.css({ display: "" });
                    var e = this.layout.options,
                        t = {};
                    (t[this.getHideRevealTransitionEndProperty("hiddenStyle")] = this.onHideTransitionEnd), this.transition({ from: e.visibleStyle, to: e.hiddenStyle, isCleaning: !0, onTransitionEnd: t });
                }),
                (l.onHideTransitionEnd = function () {
                    this.isHidden && (this.css({ display: "none" }), this.emitEvent("hide"));
                }),
                (l.destroy = function () {
                    this.css({ position: "", left: "", right: "", top: "", bottom: "", transition: "", transform: "" });
                }),
                n
        );
    }),
    (function (e, t) {
        "use strict";
        "function" == typeof define && define.amd
            ? define("outlayer/outlayer", ["ev-emitter/ev-emitter", "get-size/get-size", "fizzy-ui-utils/utils", "./item"], function (n, i, o, s) {
                return t(e, n, i, o, s);
            })
            : "object" == typeof module && module.exports
                ? (module.exports = t(e, require("ev-emitter"), require("get-size"), require("fizzy-ui-utils"), require("./item")))
                : (e.Outlayer = t(e, e.EvEmitter, e.getSize, e.fizzyUIUtils, e.Outlayer.Item));
    })(window, function (e, t, n, i, o) {
        "use strict";
        function s(e, t) {
            var n = i.getQueryElement(e);
            if (n) {
                (this.element = n), l && (this.$element = l(this.element)), (this.options = i.extend({}, this.constructor.defaults)), this.option(t);
                var o = ++d;
                (this.element.outlayerGUID = o), (u[o] = this), this._create(), this._getOption("initLayout") && this.layout();
            } else a && a.error("Bad element for " + this.constructor.namespace + ": " + (n || e));
        }
        function r(e) {
            function t() {
                e.apply(this, arguments);
            }
            return (t.prototype = Object.create(e.prototype)), (t.prototype.constructor = t), t;
        }
        var a = e.console,
            l = e.jQuery,
            c = function () {},
            d = 0,
            u = {};
        (s.namespace = "outlayer"),
            (s.Item = o),
            (s.defaults = {
                containerStyle: { position: "relative" },
                initLayout: !0,
                originLeft: !0,
                originTop: !0,
                resize: !0,
                resizeContainer: !0,
                transitionDuration: "0.4s",
                hiddenStyle: { opacity: 0, transform: "scale(0.001)" },
                visibleStyle: { opacity: 1, transform: "scale(1)" },
            });
        var h = s.prototype;
        i.extend(h, t.prototype),
            (h.option = function (e) {
                i.extend(this.options, e);
            }),
            (h._getOption = function (e) {
                var t = this.constructor.compatOptions[e];
                return t && void 0 !== this.options[t] ? this.options[t] : this.options[e];
            }),
            (s.compatOptions = {
                initLayout: "isInitLayout",
                horizontal: "isHorizontal",
                layoutInstant: "isLayoutInstant",
                originLeft: "isOriginLeft",
                originTop: "isOriginTop",
                resize: "isResizeBound",
                resizeContainer: "isResizingContainer",
            }),
            (h._create = function () {
                this.reloadItems(), (this.stamps = []), this.stamp(this.options.stamp), i.extend(this.element.style, this.options.containerStyle), this._getOption("resize") && this.bindResize();
            }),
            (h.reloadItems = function () {
                this.items = this._itemize(this.element.children);
            }),
            (h._itemize = function (e) {
                for (var t = this._filterFindItemElements(e), n = this.constructor.Item, i = [], o = 0; o < t.length; o++) {
                    var s = new n(t[o], this);
                    i.push(s);
                }
                return i;
            }),
            (h._filterFindItemElements = function (e) {
                return i.filterFindElements(e, this.options.itemSelector);
            }),
            (h.getItemElements = function () {
                return this.items.map(function (e) {
                    return e.element;
                });
            }),
            (h.layout = function () {
                this._resetLayout(), this._manageStamps();
                var e = this._getOption("layoutInstant"),
                    t = void 0 !== e ? e : !this._isLayoutInited;
                this.layoutItems(this.items, t), (this._isLayoutInited = !0);
            }),
            (h._init = h.layout),
            (h._resetLayout = function () {
                this.getSize();
            }),
            (h.getSize = function () {
                this.size = n(this.element);
            }),
            (h._getMeasurement = function (e, t) {
                var i,
                    o = this.options[e];
                o ? ("string" == typeof o ? (i = this.element.querySelector(o)) : o instanceof HTMLElement && (i = o), (this[e] = i ? n(i)[t] : o)) : (this[e] = 0);
            }),
            (h.layoutItems = function (e, t) {
                (e = this._getItemsForLayout(e)), this._layoutItems(e, t), this._postLayout();
            }),
            (h._getItemsForLayout = function (e) {
                return e.filter(function (e) {
                    return !e.isIgnored;
                });
            }),
            (h._layoutItems = function (e, t) {
                if ((this._emitCompleteOnItems("layout", e), e && e.length)) {
                    var n = [];
                    e.forEach(function (e) {
                        var i = this._getItemLayoutPosition(e);
                        (i.item = e), (i.isInstant = t || e.isLayoutInstant), n.push(i);
                    }, this),
                        this._processLayoutQueue(n);
                }
            }),
            (h._getItemLayoutPosition = function () {
                return { x: 0, y: 0 };
            }),
            (h._processLayoutQueue = function (e) {
                this.updateStagger(),
                    e.forEach(function (e, t) {
                        this._positionItem(e.item, e.x, e.y, e.isInstant, t);
                    }, this);
            }),
            (h.updateStagger = function () {
                var e = this.options.stagger;
                return null == e
                    ? void (this.stagger = 0)
                    : ((this.stagger = (function (e) {
                        if ("number" == typeof e) return e;
                        var t = e.match(/(^\d*\.?\d*)(\w*)/),
                            n = t && t[1],
                            i = t && t[2];
                        return n.length ? (n = parseFloat(n)) * (p[i] || 1) : 0;
                    })(e)),
                        this.stagger);
            }),
            (h._positionItem = function (e, t, n, i, o) {
                i ? e.goTo(t, n) : (e.stagger(o * this.stagger), e.moveTo(t, n));
            }),
            (h._postLayout = function () {
                this.resizeContainer();
            }),
            (h.resizeContainer = function () {
                if (this._getOption("resizeContainer")) {
                    var e = this._getContainerSize();
                    e && (this._setContainerMeasure(e.width, !0), this._setContainerMeasure(e.height, !1));
                }
            }),
            (h._getContainerSize = c),
            (h._setContainerMeasure = function (e, t) {
                if (void 0 !== e) {
                    var n = this.size;
                    n.isBorderBox && (e += t ? n.paddingLeft + n.paddingRight + n.borderLeftWidth + n.borderRightWidth : n.paddingBottom + n.paddingTop + n.borderTopWidth + n.borderBottomWidth),
                        (e = Math.max(e, 0)),
                        (this.element.style[t ? "width" : "height"] = e + "px");
                }
            }),
            (h._emitCompleteOnItems = function (e, t) {
                function n() {
                    o.dispatchEvent(e + "Complete", null, [t]);
                }
                function i() {
                    ++r == s && n();
                }
                var o = this,
                    s = t.length;
                if (t && s) {
                    var r = 0;
                    t.forEach(function (t) {
                        t.once(e, i);
                    });
                } else n();
            }),
            (h.dispatchEvent = function (e, t, n) {
                var i = t ? [t].concat(n) : n;
                if ((this.emitEvent(e, i), l))
                    if (((this.$element = this.$element || l(this.element)), t)) {
                        var o = l.Event(t);
                        (o.type = e), this.$element.trigger(o, n);
                    } else this.$element.trigger(e, n);
            }),
            (h.ignore = function (e) {
                var t = this.getItem(e);
                t && (t.isIgnored = !0);
            }),
            (h.unignore = function (e) {
                var t = this.getItem(e);
                t && delete t.isIgnored;
            }),
            (h.stamp = function (e) {
                (e = this._find(e)) && ((this.stamps = this.stamps.concat(e)), e.forEach(this.ignore, this));
            }),
            (h.unstamp = function (e) {
                (e = this._find(e)) &&
                e.forEach(function (e) {
                    i.removeFrom(this.stamps, e), this.unignore(e);
                }, this);
            }),
            (h._find = function (e) {
                return e ? ("string" == typeof e && (e = this.element.querySelectorAll(e)), (e = i.makeArray(e))) : void 0;
            }),
            (h._manageStamps = function () {
                this.stamps && this.stamps.length && (this._getBoundingRect(), this.stamps.forEach(this._manageStamp, this));
            }),
            (h._getBoundingRect = function () {
                var e = this.element.getBoundingClientRect(),
                    t = this.size;
                this._boundingRect = {
                    left: e.left + t.paddingLeft + t.borderLeftWidth,
                    top: e.top + t.paddingTop + t.borderTopWidth,
                    right: e.right - (t.paddingRight + t.borderRightWidth),
                    bottom: e.bottom - (t.paddingBottom + t.borderBottomWidth),
                };
            }),
            (h._manageStamp = c),
            (h._getElementOffset = function (e) {
                var t = e.getBoundingClientRect(),
                    i = this._boundingRect,
                    o = n(e);
                return { left: t.left - i.left - o.marginLeft, top: t.top - i.top - o.marginTop, right: i.right - t.right - o.marginRight, bottom: i.bottom - t.bottom - o.marginBottom };
            }),
            (h.handleEvent = i.handleEvent),
            (h.bindResize = function () {
                e.addEventListener("resize", this), (this.isResizeBound = !0);
            }),
            (h.unbindResize = function () {
                e.removeEventListener("resize", this), (this.isResizeBound = !1);
            }),
            (h.onresize = function () {
                this.resize();
            }),
            i.debounceMethod(s, "onresize", 100),
            (h.resize = function () {
                this.isResizeBound && this.needsResizeLayout() && this.layout();
            }),
            (h.needsResizeLayout = function () {
                var e = n(this.element);
                return this.size && e && e.innerWidth !== this.size.innerWidth;
            }),
            (h.addItems = function (e) {
                var t = this._itemize(e);
                return t.length && (this.items = this.items.concat(t)), t;
            }),
            (h.appended = function (e) {
                var t = this.addItems(e);
                t.length && (this.layoutItems(t, !0), this.reveal(t));
            }),
            (h.prepended = function (e) {
                var t = this._itemize(e);
                if (t.length) {
                    var n = this.items.slice(0);
                    (this.items = t.concat(n)), this._resetLayout(), this._manageStamps(), this.layoutItems(t, !0), this.reveal(t), this.layoutItems(n);
                }
            }),
            (h.reveal = function (e) {
                if ((this._emitCompleteOnItems("reveal", e), e && e.length)) {
                    var t = this.updateStagger();
                    e.forEach(function (e, n) {
                        e.stagger(n * t), e.reveal();
                    });
                }
            }),
            (h.hide = function (e) {
                if ((this._emitCompleteOnItems("hide", e), e && e.length)) {
                    var t = this.updateStagger();
                    e.forEach(function (e, n) {
                        e.stagger(n * t), e.hide();
                    });
                }
            }),
            (h.revealItemElements = function (e) {
                var t = this.getItems(e);
                this.reveal(t);
            }),
            (h.hideItemElements = function (e) {
                var t = this.getItems(e);
                this.hide(t);
            }),
            (h.getItem = function (e) {
                for (var t = 0; t < this.items.length; t++) {
                    var n = this.items[t];
                    if (n.element == e) return n;
                }
            }),
            (h.getItems = function (e) {
                e = i.makeArray(e);
                var t = [];
                return (
                    e.forEach(function (e) {
                        var n = this.getItem(e);
                        n && t.push(n);
                    }, this),
                        t
                );
            }),
            (h.remove = function (e) {
                var t = this.getItems(e);
                this._emitCompleteOnItems("remove", t),
                t &&
                t.length &&
                t.forEach(function (e) {
                    e.remove(), i.removeFrom(this.items, e);
                }, this);
            }),
            (h.destroy = function () {
                var e = this.element.style;
                (e.height = ""),
                    (e.position = ""),
                    (e.width = ""),
                    this.items.forEach(function (e) {
                        e.destroy();
                    }),
                    this.unbindResize();
                var t = this.element.outlayerGUID;
                delete u[t], delete this.element.outlayerGUID, l && l.removeData(this.element, this.constructor.namespace);
            }),
            (s.data = function (e) {
                var t = (e = i.getQueryElement(e)) && e.outlayerGUID;
                return t && u[t];
            }),
            (s.create = function (e, t) {
                var n = r(s);
                return (
                    (n.defaults = i.extend({}, s.defaults)),
                        i.extend(n.defaults, t),
                        (n.compatOptions = i.extend({}, s.compatOptions)),
                        (n.namespace = e),
                        (n.data = s.data),
                        (n.Item = r(o)),
                        i.htmlInit(n, e),
                    l && l.bridget && l.bridget(e, n),
                        n
                );
            });
        var p = { ms: 1, s: 1e3 };
        return (s.Item = o), s;
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("isotope/js/item", ["outlayer/outlayer"], t)
            : "object" == typeof module && module.exports
                ? (module.exports = t(require("outlayer")))
                : ((e.Isotope = e.Isotope || {}), (e.Isotope.Item = t(e.Outlayer)));
    })(window, function (e) {
        "use strict";
        function t() {
            e.Item.apply(this, arguments);
        }
        var n = (t.prototype = Object.create(e.Item.prototype)),
            i = n._create;
        (n._create = function () {
            (this.id = this.layout.itemGUID++), i.call(this), (this.sortData = {});
        }),
            (n.updateSortData = function () {
                if (!this.isIgnored) {
                    (this.sortData.id = this.id), (this.sortData["original-order"] = this.id), (this.sortData.random = Math.random());
                    var e = this.layout.options.getSortData,
                        t = this.layout._sorters;
                    for (var n in e) {
                        var i = t[n];
                        this.sortData[n] = i(this.element, this);
                    }
                }
            });
        var o = n.destroy;
        return (
            (n.destroy = function () {
                o.apply(this, arguments), this.css({ display: "" });
            }),
                t
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("isotope/js/layout-mode", ["get-size/get-size", "outlayer/outlayer"], t)
            : "object" == typeof module && module.exports
                ? (module.exports = t(require("get-size"), require("outlayer")))
                : ((e.Isotope = e.Isotope || {}), (e.Isotope.LayoutMode = t(e.getSize, e.Outlayer)));
    })(window, function (e, t) {
        "use strict";
        function n(e) {
            (this.isotope = e), e && ((this.options = e.options[this.namespace]), (this.element = e.element), (this.items = e.filteredItems), (this.size = e.size));
        }
        var i = n.prototype;
        return (
            ["_resetLayout", "_getItemLayoutPosition", "_manageStamp", "_getContainerSize", "_getElementOffset", "needsResizeLayout", "_getOption"].forEach(function (e) {
                i[e] = function () {
                    return t.prototype[e].apply(this.isotope, arguments);
                };
            }),
                (i.needsVerticalResizeLayout = function () {
                    var t = e(this.isotope.element);
                    return this.isotope.size && t && t.innerHeight != this.isotope.size.innerHeight;
                }),
                (i._getMeasurement = function () {
                    this.isotope._getMeasurement.apply(this, arguments);
                }),
                (i.getColumnWidth = function () {
                    this.getSegmentSize("column", "Width");
                }),
                (i.getRowHeight = function () {
                    this.getSegmentSize("row", "Height");
                }),
                (i.getSegmentSize = function (e, t) {
                    var n = e + t,
                        i = "outer" + t;
                    if ((this._getMeasurement(n, i), !this[n])) {
                        var o = this.getFirstItemSize();
                        this[n] = (o && o[i]) || this.isotope.size["inner" + t];
                    }
                }),
                (i.getFirstItemSize = function () {
                    var t = this.isotope.filteredItems[0];
                    return t && t.element && e(t.element);
                }),
                (i.layout = function () {
                    this.isotope.layout.apply(this.isotope, arguments);
                }),
                (i.getSize = function () {
                    this.isotope.getSize(), (this.size = this.isotope.size);
                }),
                (n.modes = {}),
                (n.create = function (e, t) {
                    function o() {
                        n.apply(this, arguments);
                    }
                    return (o.prototype = Object.create(i)), (o.prototype.constructor = o), t && (o.options = t), (o.prototype.namespace = e), (n.modes[e] = o), o;
                }),
                n
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("masonry/masonry", ["outlayer/outlayer", "get-size/get-size"], t)
            : "object" == typeof module && module.exports
                ? (module.exports = t(require("outlayer"), require("get-size")))
                : (e.Masonry = t(e.Outlayer, e.getSize));
    })(window, function (e, t) {
        var n = e.create("masonry");
        return (
            (n.compatOptions.fitWidth = "isFitWidth"),
                (n.prototype._resetLayout = function () {
                    this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns(), (this.colYs = []);
                    for (var e = 0; e < this.cols; e++) this.colYs.push(0);
                    this.maxY = 0;
                }),
                (n.prototype.measureColumns = function () {
                    if ((this.getContainerWidth(), !this.columnWidth)) {
                        var e = this.items[0],
                            n = e && e.element;
                        this.columnWidth = (n && t(n).outerWidth) || this.containerWidth;
                    }
                    var i = (this.columnWidth += this.gutter),
                        o = this.containerWidth + this.gutter,
                        s = o / i,
                        r = i - (o % i);
                    (s = Math[r && 1 > r ? "round" : "floor"](s)), (this.cols = Math.max(s, 1));
                }),
                (n.prototype.getContainerWidth = function () {
                    var e = this._getOption("fitWidth") ? this.element.parentNode : this.element,
                        n = t(e);
                    this.containerWidth = n && n.innerWidth;
                }),
                (n.prototype._getItemLayoutPosition = function (e) {
                    e.getSize();
                    var t = e.size.outerWidth % this.columnWidth,
                        n = Math[t && 1 > t ? "round" : "ceil"](e.size.outerWidth / this.columnWidth);
                    n = Math.min(n, this.cols);
                    for (var i = this._getColGroup(n), o = Math.min.apply(Math, i), s = i.indexOf(o), r = { x: this.columnWidth * s, y: o }, a = o + e.size.outerHeight, l = this.cols + 1 - i.length, c = 0; l > c; c++) this.colYs[s + c] = a;
                    return r;
                }),
                (n.prototype._getColGroup = function (e) {
                    if (2 > e) return this.colYs;
                    for (var t = [], n = this.cols + 1 - e, i = 0; n > i; i++) {
                        var o = this.colYs.slice(i, i + e);
                        t[i] = Math.max.apply(Math, o);
                    }
                    return t;
                }),
                (n.prototype._manageStamp = function (e) {
                    var n = t(e),
                        i = this._getElementOffset(e),
                        o = this._getOption("originLeft") ? i.left : i.right,
                        s = o + n.outerWidth,
                        r = Math.floor(o / this.columnWidth);
                    r = Math.max(0, r);
                    var a = Math.floor(s / this.columnWidth);
                    (a -= s % this.columnWidth ? 0 : 1), (a = Math.min(this.cols - 1, a));
                    for (var l = (this._getOption("originTop") ? i.top : i.bottom) + n.outerHeight, c = r; a >= c; c++) this.colYs[c] = Math.max(l, this.colYs[c]);
                }),
                (n.prototype._getContainerSize = function () {
                    this.maxY = Math.max.apply(Math, this.colYs);
                    var e = { height: this.maxY };
                    return this._getOption("fitWidth") && (e.width = this._getContainerFitWidth()), e;
                }),
                (n.prototype._getContainerFitWidth = function () {
                    for (var e = 0, t = this.cols; --t && 0 === this.colYs[t]; ) e++;
                    return (this.cols - e) * this.columnWidth - this.gutter;
                }),
                (n.prototype.needsResizeLayout = function () {
                    var e = this.containerWidth;
                    return this.getContainerWidth(), e != this.containerWidth;
                }),
                n
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define("isotope/js/layout-modes/masonry", ["../layout-mode", "masonry/masonry"], t)
            : "object" == typeof module && module.exports
                ? (module.exports = t(require("../layout-mode"), require("masonry-layout")))
                : t(e.Isotope.LayoutMode, e.Masonry);
    })(window, function (e, t) {
        "use strict";
        var n = e.create("masonry"),
            i = n.prototype,
            o = { _getElementOffset: !0, layout: !0, _getMeasurement: !0 };
        for (var s in t.prototype) o[s] || (i[s] = t.prototype[s]);
        var r = i.measureColumns;
        i.measureColumns = function () {
            (this.items = this.isotope.filteredItems), r.call(this);
        };
        var a = i._getOption;
        return (
            (i._getOption = function (e) {
                return "fitWidth" == e ? (void 0 !== this.options.isFitWidth ? this.options.isFitWidth : this.options.fitWidth) : a.apply(this.isotope, arguments);
            }),
                n
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/fit-rows", ["../layout-mode"], t) : "object" == typeof exports ? (module.exports = t(require("../layout-mode"))) : t(e.Isotope.LayoutMode);
    })(window, function (e) {
        "use strict";
        var t = e.create("fitRows"),
            n = t.prototype;
        return (
            (n._resetLayout = function () {
                (this.x = 0), (this.y = 0), (this.maxY = 0), this._getMeasurement("gutter", "outerWidth");
            }),
                (n._getItemLayoutPosition = function (e) {
                    e.getSize();
                    var t = e.size.outerWidth + this.gutter,
                        n = this.isotope.size.innerWidth + this.gutter;
                    0 !== this.x && t + this.x > n && ((this.x = 0), (this.y = this.maxY));
                    var i = { x: this.x, y: this.y };
                    return (this.maxY = Math.max(this.maxY, this.y + e.size.outerHeight)), (this.x += t), i;
                }),
                (n._getContainerSize = function () {
                    return { height: this.maxY };
                }),
                t
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd ? define("isotope/js/layout-modes/vertical", ["../layout-mode"], t) : "object" == typeof module && module.exports ? (module.exports = t(require("../layout-mode"))) : t(e.Isotope.LayoutMode);
    })(window, function (e) {
        "use strict";
        var t = e.create("vertical", { horizontalAlignment: 0 }),
            n = t.prototype;
        return (
            (n._resetLayout = function () {
                this.y = 0;
            }),
                (n._getItemLayoutPosition = function (e) {
                    e.getSize();
                    var t = (this.isotope.size.innerWidth - e.size.outerWidth) * this.options.horizontalAlignment,
                        n = this.y;
                    return (this.y += e.size.outerHeight), { x: t, y: n };
                }),
                (n._getContainerSize = function () {
                    return { height: this.y };
                }),
                t
        );
    }),
    (function (e, t) {
        "function" == typeof define && define.amd
            ? define([
                "outlayer/outlayer",
                "get-size/get-size",
                "desandro-matches-selector/matches-selector",
                "fizzy-ui-utils/utils",
                "isotope/js/item",
                "isotope/js/layout-mode",
                "isotope/js/layout-modes/masonry",
                "isotope/js/layout-modes/fit-rows",
                "isotope/js/layout-modes/vertical",
            ], function (n, i, o, s, r, a) {
                return t(e, n, i, o, s, r, a);
            })
            : "object" == typeof module && module.exports
                ? (module.exports = t(
                    e,
                    require("outlayer"),
                    require("get-size"),
                    require("desandro-matches-selector"),
                    require("fizzy-ui-utils"),
                    require("isotope/js/item"),
                    require("isotope/js/layout-mode"),
                    require("isotope/js/layout-modes/masonry"),
                    require("isotope/js/layout-modes/fit-rows"),
                    require("isotope/js/layout-modes/vertical")
                ))
                : (e.Isotope = t(e, e.Outlayer, e.getSize, e.matchesSelector, e.fizzyUIUtils, e.Isotope.Item, e.Isotope.LayoutMode));
    })(window, function (e, t, n, i, o, s, r) {
        var a = e.jQuery,
            l = String.prototype.trim
                ? function (e) {
                    return e.trim();
                }
                : function (e) {
                    return e.replace(/^\s+|\s+$/g, "");
                },
            c = t.create("isotope", { layoutMode: "masonry", isJQueryFiltering: !0, sortAscending: !0 });
        (c.Item = s), (c.LayoutMode = r);
        var d = c.prototype;
        (d._create = function () {
            for (var e in ((this.itemGUID = 0), (this._sorters = {}), this._getSorters(), t.prototype._create.call(this), (this.modes = {}), (this.filteredItems = this.items), (this.sortHistory = ["original-order"]), r.modes))
                this._initLayoutMode(e);
        }),
            (d.reloadItems = function () {
                (this.itemGUID = 0), t.prototype.reloadItems.call(this);
            }),
            (d._itemize = function () {
                for (var e = t.prototype._itemize.apply(this, arguments), n = 0; n < e.length; n++) {
                    e[n].id = this.itemGUID++;
                }
                return this._updateItemsSortData(e), e;
            }),
            (d._initLayoutMode = function (e) {
                var t = r.modes[e],
                    n = this.options[e] || {};
                (this.options[e] = t.options ? o.extend(t.options, n) : n), (this.modes[e] = new t(this));
            }),
            (d.layout = function () {
                return !this._isLayoutInited && this._getOption("initLayout") ? void this.arrange() : void this._layout();
            }),
            (d._layout = function () {
                var e = this._getIsInstant();
                this._resetLayout(), this._manageStamps(), this.layoutItems(this.filteredItems, e), (this._isLayoutInited = !0);
            }),
            (d.arrange = function (e) {
                this.option(e), this._getIsInstant();
                var t = this._filter(this.items);
                (this.filteredItems = t.matches), this._bindArrangeComplete(), this._isInstant ? this._noTransition(this._hideReveal, [t]) : this._hideReveal(t), this._sort(), this._layout();
            }),
            (d._init = d.arrange),
            (d._hideReveal = function (e) {
                this.reveal(e.needReveal), this.hide(e.needHide);
            }),
            (d._getIsInstant = function () {
                var e = this._getOption("layoutInstant"),
                    t = void 0 !== e ? e : !this._isLayoutInited;
                return (this._isInstant = t), t;
            }),
            (d._bindArrangeComplete = function () {
                function e() {
                    t && n && i && o.dispatchEvent("arrangeComplete", null, [o.filteredItems]);
                }
                var t,
                    n,
                    i,
                    o = this;
                this.once("layoutComplete", function () {
                    (t = !0), e();
                }),
                    this.once("hideComplete", function () {
                        (n = !0), e();
                    }),
                    this.once("revealComplete", function () {
                        (i = !0), e();
                    });
            }),
            (d._filter = function (e) {
                var t = this.options.filter;
                t = t || "*";
                for (var n = [], i = [], o = [], s = this._getFilterTest(t), r = 0; r < e.length; r++) {
                    var a = e[r];
                    if (!a.isIgnored) {
                        var l = s(a);
                        l && n.push(a), l && a.isHidden ? i.push(a) : l || a.isHidden || o.push(a);
                    }
                }
                return { matches: n, needReveal: i, needHide: o };
            }),
            (d._getFilterTest = function (e) {
                return a && this.options.isJQueryFiltering
                    ? function (t) {
                        return a(t.element).is(e);
                    }
                    : "function" == typeof e
                        ? function (t) {
                            return e(t.element);
                        }
                        : function (t) {
                            return i(t.element, e);
                        };
            }),
            (d.updateSortData = function (e) {
                var t;
                e ? ((e = o.makeArray(e)), (t = this.getItems(e))) : (t = this.items), this._getSorters(), this._updateItemsSortData(t);
            }),
            (d._getSorters = function () {
                var e = this.options.getSortData;
                for (var t in e) {
                    var n = e[t];
                    this._sorters[t] = u(n);
                }
            }),
            (d._updateItemsSortData = function (e) {
                for (var t = e && e.length, n = 0; t && t > n; n++) {
                    e[n].updateSortData();
                }
            });
        var u = (function () {
            return function (e) {
                if ("string" != typeof e) return e;
                var t = l(e).split(" "),
                    n = t[0],
                    i = n.match(/^\[(.+)\]$/),
                    o = (function (e, t) {
                        return e
                            ? function (t) {
                                return t.getAttribute(e);
                            }
                            : function (e) {
                                var n = e.querySelector(t);
                                return n && n.textContent;
                            };
                    })(i && i[1], n),
                    s = c.sortDataParsers[t[1]];
                return s
                    ? function (e) {
                        return e && s(o(e));
                    }
                    : function (e) {
                        return e && o(e);
                    };
            };
        })();
        (c.sortDataParsers = {
            parseInt: function (e) {
                return parseInt(e, 10);
            },
            parseFloat: function (e) {
                return parseFloat(e);
            },
        }),
            (d._sort = function () {
                var e = this.options.sortBy;
                if (e) {
                    var t = (function (e, t) {
                        return function (n, i) {
                            for (var o = 0; o < e.length; o++) {
                                var s = e[o],
                                    r = n.sortData[s],
                                    a = i.sortData[s];
                                if (r > a || a > r) return (r > a ? 1 : -1) * ((void 0 !== t[s] ? t[s] : t) ? 1 : -1);
                            }
                            return 0;
                        };
                    })([].concat.apply(e, this.sortHistory), this.options.sortAscending);
                    this.filteredItems.sort(t), e != this.sortHistory[0] && this.sortHistory.unshift(e);
                }
            }),
            (d._mode = function () {
                var e = this.options.layoutMode,
                    t = this.modes[e];
                if (!t) throw new Error("No layout mode: " + e);
                return (t.options = this.options[e]), t;
            }),
            (d._resetLayout = function () {
                t.prototype._resetLayout.call(this), this._mode()._resetLayout();
            }),
            (d._getItemLayoutPosition = function (e) {
                return this._mode()._getItemLayoutPosition(e);
            }),
            (d._manageStamp = function (e) {
                this._mode()._manageStamp(e);
            }),
            (d._getContainerSize = function () {
                return this._mode()._getContainerSize();
            }),
            (d.needsResizeLayout = function () {
                return this._mode().needsResizeLayout();
            }),
            (d.appended = function (e) {
                var t = this.addItems(e);
                if (t.length) {
                    var n = this._filterRevealAdded(t);
                    this.filteredItems = this.filteredItems.concat(n);
                }
            }),
            (d.prepended = function (e) {
                var t = this._itemize(e);
                if (t.length) {
                    this._resetLayout(), this._manageStamps();
                    var n = this._filterRevealAdded(t);
                    this.layoutItems(this.filteredItems), (this.filteredItems = n.concat(this.filteredItems)), (this.items = t.concat(this.items));
                }
            }),
            (d._filterRevealAdded = function (e) {
                var t = this._filter(e);
                return this.hide(t.needHide), this.reveal(t.matches), this.layoutItems(t.matches, !0), t.matches;
            }),
            (d.insert = function (e) {
                var t = this.addItems(e);
                if (t.length) {
                    var n,
                        i,
                        o = t.length;
                    for (n = 0; o > n; n++) (i = t[n]), this.element.appendChild(i.element);
                    var s = this._filter(t).matches;
                    for (n = 0; o > n; n++) t[n].isLayoutInstant = !0;
                    for (this.arrange(), n = 0; o > n; n++) delete t[n].isLayoutInstant;
                    this.reveal(s);
                }
            });
        var h = d.remove;
        return (
            (d.remove = function (e) {
                e = o.makeArray(e);
                var t = this.getItems(e);
                h.call(this, e);
                for (var n = t && t.length, i = 0; n && n > i; i++) {
                    var s = t[i];
                    o.removeFrom(this.filteredItems, s);
                }
            }),
                (d.shuffle = function () {
                    for (var e = 0; e < this.items.length; e++) {
                        this.items[e].sortData.random = Math.random();
                    }
                    (this.options.sortBy = "random"), this._sort(), this._layout();
                }),
                (d._noTransition = function (e, t) {
                    var n = this.options.transitionDuration;
                    this.options.transitionDuration = 0;
                    var i = e.apply(this, t);
                    return (this.options.transitionDuration = n), i;
                }),
                (d.getFilteredItemElements = function () {
                    return this.filteredItems.map(function (e) {
                        return e.element;
                    });
                }),
                c
        );
    }),
    function () {
        var e,
            t,
            n,
            i,
            o,
            s = function (e, t) {
                return function () {
                    return e.apply(t, arguments);
                };
            },
            r =
                [].indexOf ||
                function (e) {
                    for (var t = 0, n = this.length; t < n; t++) if (t in this && this[t] === e) return t;
                    return -1;
                };
        (t = (function () {
            function e() {}
            return (
                (e.prototype.extend = function (e, t) {
                    var n, i;
                    for (n in t) (i = t[n]), null == e[n] && (e[n] = i);
                    return e;
                }),
                    (e.prototype.isMobile = function (e) {
                        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(e);
                    }),
                    (e.prototype.createEvent = function (e, t, n, i) {
                        var o;
                        return (
                            null == t && (t = !1),
                            null == n && (n = !1),
                            null == i && (i = null),
                                null != document.createEvent ? (o = document.createEvent("CustomEvent")).initCustomEvent(e, t, n, i) : null != document.createEventObject ? ((o = document.createEventObject()).eventType = e) : (o.eventName = e),
                                o
                        );
                    }),
                    (e.prototype.emitEvent = function (e, t) {
                        return null != e.dispatchEvent ? e.dispatchEvent(t) : t in (null != e) ? e[t]() : "on" + t in (null != e) ? e["on" + t]() : void 0;
                    }),
                    (e.prototype.addEvent = function (e, t, n) {
                        return null != e.addEventListener ? e.addEventListener(t, n, !1) : null != e.attachEvent ? e.attachEvent("on" + t, n) : (e[t] = n);
                    }),
                    (e.prototype.removeEvent = function (e, t, n) {
                        return null != e.removeEventListener ? e.removeEventListener(t, n, !1) : null != e.detachEvent ? e.detachEvent("on" + t, n) : delete e[t];
                    }),
                    (e.prototype.innerHeight = function () {
                        return "innerHeight" in window ? window.innerHeight : document.documentElement.clientHeight;
                    }),
                    e
            );
        })()),
            (n =
                this.WeakMap ||
                this.MozWeakMap ||
                (n = (function () {
                    function e() {
                        (this.keys = []), (this.values = []);
                    }
                    return (
                        (e.prototype.get = function (e) {
                            var t, n, i, o;
                            for (t = n = 0, i = (o = this.keys).length; n < i; t = ++n) if (o[t] === e) return this.values[t];
                        }),
                            (e.prototype.set = function (e, t) {
                                var n, i, o, s;
                                for (n = i = 0, o = (s = this.keys).length; i < o; n = ++i) if (s[n] === e) return void (this.values[n] = t);
                                return this.keys.push(e), this.values.push(t);
                            }),
                            e
                    );
                })())),
            (e =
                this.MutationObserver ||
                this.WebkitMutationObserver ||
                this.MozMutationObserver ||
                (e = (function () {
                    function e() {
                        "undefined" != typeof console && null !== console && console.warn("MutationObserver is not supported by your browser."),
                        "undefined" != typeof console && null !== console && console.warn("WOW.js cannot detect dom mutations, please call .sync() after loading new content.");
                    }
                    return (e.notSupported = !0), (e.prototype.observe = function () {}), e;
                })())),
            (i =
                this.getComputedStyle ||
                function (e, t) {
                    return (
                        (this.getPropertyValue = function (t) {
                            var n;
                            return (
                                "float" === t && (t = "styleFloat"),
                                o.test(t) &&
                                t.replace(o, function (e, t) {
                                    return t.toUpperCase();
                                }),
                                (null != (n = e.currentStyle) ? n[t] : void 0) || null
                            );
                        }),
                            this
                    );
                }),
            (o = /(\-([a-z]){1})/g),
            (this.WOW = (function () {
                function o(e) {
                    null == e && (e = {}),
                        (this.scrollCallback = s(this.scrollCallback, this)),
                        (this.scrollHandler = s(this.scrollHandler, this)),
                        (this.resetAnimation = s(this.resetAnimation, this)),
                        (this.start = s(this.start, this)),
                        (this.scrolled = !0),
                        (this.config = this.util().extend(e, this.defaults)),
                    null != e.scrollContainer && (this.config.scrollContainer = document.querySelector(e.scrollContainer)),
                        (this.animationNameCache = new n()),
                        (this.wowEvent = this.util().createEvent(this.config.boxClass));
                }
                return (
                    (o.prototype.defaults = { boxClass: "wow", animateClass: "animated", offset: 0, mobile: !0, live: !0, callback: null, scrollContainer: null }),
                        (o.prototype.init = function () {
                            var e;
                            return (
                                (this.element = window.document.documentElement),
                                    "interactive" === (e = document.readyState) || "complete" === e ? this.start() : this.util().addEvent(document, "DOMContentLoaded", this.start),
                                    (this.finished = [])
                            );
                        }),
                        (o.prototype.start = function () {
                            var t, n, i, o, s;
                            if (
                                ((this.stopped = !1),
                                    (this.boxes = function () {
                                        var e, n, i, o;
                                        for (o = [], e = 0, n = (i = this.element.querySelectorAll("." + this.config.boxClass)).length; e < n; e++) (t = i[e]), o.push(t);
                                        return o;
                                    }.call(this)),
                                    (this.all = function () {
                                        var e, n, i, o;
                                        for (o = [], e = 0, n = (i = this.boxes).length; e < n; e++) (t = i[e]), o.push(t);
                                        return o;
                                    }.call(this)),
                                    this.boxes.length)
                            )
                                if (this.disabled()) this.resetStyle();
                                else for (n = 0, i = (o = this.boxes).length; n < i; n++) (t = o[n]), this.applyStyle(t, !0);
                            if (
                                (this.disabled() ||
                                (this.util().addEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().addEvent(window, "resize", this.scrollHandler), (this.interval = setInterval(this.scrollCallback, 50))),
                                    this.config.live)
                            )
                                return new e(
                                    ((s = this),
                                        function (e) {
                                            var t, n, i, o, r;
                                            for (r = [], t = 0, n = e.length; t < n; t++)
                                                (o = e[t]),
                                                    r.push(
                                                        function () {
                                                            var e, t, n, s;
                                                            for (s = [], e = 0, t = (n = o.addedNodes || []).length; e < t; e++) (i = n[e]), s.push(this.doSync(i));
                                                            return s;
                                                        }.call(s)
                                                    );
                                            return r;
                                        })
                                ).observe(document.body, { childList: !0, subtree: !0 });
                        }),
                        (o.prototype.stop = function () {
                            if (((this.stopped = !0), this.util().removeEvent(this.config.scrollContainer || window, "scroll", this.scrollHandler), this.util().removeEvent(window, "resize", this.scrollHandler), null != this.interval))
                                return clearInterval(this.interval);
                        }),
                        (o.prototype.sync = function (t) {
                            if (e.notSupported) return this.doSync(this.element);
                        }),
                        (o.prototype.doSync = function (e) {
                            var t, n, i, o, s;
                            if ((null == e && (e = this.element), 1 === e.nodeType)) {
                                for (s = [], n = 0, i = (o = (e = e.parentNode || e).querySelectorAll("." + this.config.boxClass)).length; n < i; n++)
                                    (t = o[n]), r.call(this.all, t) < 0 ? (this.boxes.push(t), this.all.push(t), this.stopped || this.disabled() ? this.resetStyle() : this.applyStyle(t, !0), s.push((this.scrolled = !0))) : s.push(void 0);
                                return s;
                            }
                        }),
                        (o.prototype.show = function (e) {
                            return (
                                this.applyStyle(e),
                                    e.setAttribute("class", e.getAttribute("class") + " " + this.config.animateClass),
                                null != this.config.callback && this.config.callback(e),
                                    this.util().emitEvent(e, this.wowEvent),
                                    this.util().addEvent(e, "animationend", this.resetAnimation),
                                    this.util().addEvent(e, "oanimationend", this.resetAnimation),
                                    this.util().addEvent(e, "webkitAnimationEnd", this.resetAnimation),
                                    this.util().addEvent(e, "MSAnimationEnd", this.resetAnimation),
                                    e
                            );
                        }),
                        (o.prototype.applyStyle = function (e, t) {
                            var n, i, o, s;
                            return (
                                (i = e.getAttribute("data-wow-duration")),
                                    (n = e.getAttribute("data-wow-delay")),
                                    (o = e.getAttribute("data-wow-iteration")),
                                    this.animate(
                                        ((s = this),
                                            function () {
                                                return s.customStyle(e, t, i, n, o);
                                            })
                                    )
                            );
                        }),
                        (o.prototype.animate =
                            "requestAnimationFrame" in window
                                ? function (e) {
                                    return window.requestAnimationFrame(e);
                                }
                                : function (e) {
                                    return e();
                                }),
                        (o.prototype.resetStyle = function () {
                            var e, t, n, i, o;
                            for (o = [], t = 0, n = (i = this.boxes).length; t < n; t++) (e = i[t]), o.push((e.style.visibility = "visible"));
                            return o;
                        }),
                        (o.prototype.resetAnimation = function (e) {
                            var t;
                            if (e.type.toLowerCase().indexOf("animationend") >= 0) return (t = e.target || e.srcElement).setAttribute("class", t.getAttribute("class").replace(this.config.animateClass).trim());
                        }),
                        (o.prototype.customStyle = function (e, t, n, i, o) {
                            return (
                                t && this.cacheAnimationName(e),
                                    (e.style.visibility = t ? "hidden" : "visible"),
                                n && this.vendorSet(e.style, { animationDuration: n }),
                                i && this.vendorSet(e.style, { animationDelay: i }),
                                o && this.vendorSet(e.style, { animationIterationCount: o }),
                                    this.vendorSet(e.style, { animationName: t ? "none" : this.cachedAnimationName(e) }),
                                    e
                            );
                        }),
                        (o.prototype.vendors = ["moz", "webkit"]),
                        (o.prototype.vendorSet = function (e, t) {
                            var n, i, o, s;
                            for (n in ((i = []), t))
                                (o = t[n]),
                                    (e["" + n] = o),
                                    i.push(
                                        function () {
                                            var t, i, r, a;
                                            for (a = [], t = 0, i = (r = this.vendors).length; t < i; t++) (s = r[t]), a.push((e["" + s + n.charAt(0).toUpperCase() + n.substr(1)] = o));
                                            return a;
                                        }.call(this)
                                    );
                            return i;
                        }),
                        (o.prototype.vendorCSS = function (e, t) {
                            var n, o, s, r, a, l;
                            for (r = (a = i(e)).getPropertyCSSValue(t), n = 0, o = (s = this.vendors).length; n < o; n++) (l = s[n]), (r = r || a.getPropertyCSSValue("-" + l + "-" + t));
                            return r;
                        }),
                        (o.prototype.animationName = function (e) {
                            var t;
                            try {
                                t = this.vendorCSS(e, "animation-name").cssText;
                            } catch (n) {
                                t = i(e).getPropertyValue("animation-name");
                            }
                            return "none" === t ? "" : t;
                        }),
                        (o.prototype.cacheAnimationName = function (e) {
                            return this.animationNameCache.set(e, this.animationName(e));
                        }),
                        (o.prototype.cachedAnimationName = function (e) {
                            return this.animationNameCache.get(e);
                        }),
                        (o.prototype.scrollHandler = function () {
                            return (this.scrolled = !0);
                        }),
                        (o.prototype.scrollCallback = function () {
                            var e;
                            if (
                                this.scrolled &&
                                ((this.scrolled = !1),
                                    (this.boxes = function () {
                                        var t, n, i, o;
                                        for (o = [], t = 0, n = (i = this.boxes).length; t < n; t++) (e = i[t]) && (this.isVisible(e) ? this.show(e) : o.push(e));
                                        return o;
                                    }.call(this)),
                                !this.boxes.length && !this.config.live)
                            )
                                return this.stop();
                        }),
                        (o.prototype.offsetTop = function (e) {
                            for (var t; void 0 === e.offsetTop; ) e = e.parentNode;
                            for (t = e.offsetTop; (e = e.offsetParent); ) t += e.offsetTop;
                            return t;
                        }),
                        (o.prototype.isVisible = function (e) {
                            var t, n, i, o, s;
                            return (
                                (n = e.getAttribute("data-wow-offset") || this.config.offset),
                                    (o = (s = (this.config.scrollContainer && this.config.scrollContainer.scrollTop) || window.pageYOffset) + Math.min(this.element.clientHeight, this.util().innerHeight()) - n),
                                    (t = (i = this.offsetTop(e)) + e.clientHeight),
                                i <= o && t >= s
                            );
                        }),
                        (o.prototype.util = function () {
                            return null != this._util ? this._util : (this._util = new t());
                        }),
                        (o.prototype.disabled = function () {
                            return !this.config.mobile && this.util().isMobile(navigator.userAgent);
                        }),
                        o
                );
            })());
    }.call(this),
    (function () {
        for (
            var e,
                t = function () {},
                n = [
                    "assert",
                    "clear",
                    "count",
                    "debug",
                    "dir",
                    "dirxml",
                    "error",
                    "exception",
                    "group",
                    "groupCollapsed",
                    "groupEnd",
                    "info",
                    "log",
                    "markTimeline",
                    "profile",
                    "profileEnd",
                    "table",
                    "time",
                    "timeEnd",
                    "timeline",
                    "timelineEnd",
                    "timeStamp",
                    "trace",
                    "warn",
                ],
                i = n.length,
                o = (window.console = window.console || {});
            i--;

        )
            o[(e = n[i])] || (o[e] = t);
    })(),
    (function (e, t, n) {
        "use strict";
        (e.fn.scrollUp = function (t) {
            e.data(n.body, "scrollUp") || (e.data(n.body, "scrollUp", !0), e.fn.scrollUp.init(t));
        }),
            (e.fn.scrollUp.init = function (i) {
                var o,
                    s,
                    r,
                    a,
                    l,
                    c,
                    d = (e.fn.scrollUp.settings = e.extend({}, e.fn.scrollUp.defaults, i)),
                    u = !1;
                switch (
                    ((c = d.scrollTrigger ? e(d.scrollTrigger) : e("<a/>", { id: d.scrollName, href: "#top" })),
                    d.scrollTitle && c.attr("title", d.scrollTitle),
                        c.appendTo("body"),
                    d.scrollImg || d.scrollTrigger || c.html(d.scrollText),
                        c.css({ display: "none", position: "fixed", zIndex: d.zIndex }),
                    d.activeOverlay &&
                    e("<div/>", { id: d.scrollName + "-active" })
                        .css({ position: "absolute", top: d.scrollDistance + "px", width: "100%", borderTop: "1px dotted" + d.activeOverlay, zIndex: d.zIndex })
                        .appendTo("body"),
                        d.animation)
                    ) {
                    case "fade":
                        (o = "fadeIn"), (s = "fadeOut"), (r = d.animationSpeed);
                        break;
                    case "slide":
                        (o = "slideDown"), (s = "slideUp"), (r = d.animationSpeed);
                        break;
                    default:
                        (o = "show"), (s = "hide"), (r = 0);
                }
                (a = "top" === d.scrollFrom ? d.scrollDistance : e(n).height() - e(t).height() - d.scrollDistance),
                    e(t).scroll(function () {
                        e(t).scrollTop() > a ? u || (c[o](r), (u = !0)) : u && (c[s](r), (u = !1));
                    }),
                    d.scrollTarget ? ("number" == typeof d.scrollTarget ? (l = d.scrollTarget) : "string" == typeof d.scrollTarget && (l = Math.floor(e(d.scrollTarget).offset().top))) : (l = 0),
                    c.click(function (t) {
                        t.preventDefault(), e("html, body").animate({ scrollTop: l }, d.scrollSpeed, d.easingType);
                    });
            }),
            (e.fn.scrollUp.defaults = {
                scrollName: "scrollUp",
                scrollDistance: 300,
                scrollFrom: "top",
                scrollSpeed: 300,
                easingType: "linear",
                animation: "fade",
                animationSpeed: 200,
                scrollTrigger: !1,
                scrollTarget: !1,
                scrollText: "Scroll to top",
                scrollTitle: !1,
                scrollImg: !1,
                activeOverlay: !1,
                zIndex: 2147483647,
            }),
            (e.fn.scrollUp.destroy = function (i) {
                e.removeData(n.body, "scrollUp"),
                    e("#" + e.fn.scrollUp.settings.scrollName).remove(),
                    e("#" + e.fn.scrollUp.settings.scrollName + "-active").remove(),
                    e.fn.jquery.split(".")[1] >= 7 ? e(t).off("scroll", i) : e(t).unbind("scroll", i);
            }),
            (e.scrollUp = e.fn.scrollUp);
    })(jQuery, window, document),
    (function (e) {
        "use strict";
            e.scrollUp({ scrollText: '<i class="arrow_carrot-up"></i>', easingType: "linear", scrollSpeed: 900, animation: "slide" }),
            e(".main-slider").slick({
                arrows: !0,
                prevArrow: "<button type='button' class='slick-prev'><i class='arrow_carrot-left'></i></button>",
                nextArrow: "<button type='button' class='slick-next'><i class='arrow_carrot-right'></i></button>",
                autoplay: !1,
                autoplaySpeed: 5e3,
                dots: !0,
                pauseOnFocus: !1,
                pauseOnHover: !1,
                fade: !0,
                infinite: !0,
                slidesToShow: 1,
                responsive: [
                    { breakpoint: 767, settings: { arrows: !1 } },
                    { breakpoint: 479, settings: { arrows: !1 } },
                ],
            }),
            e(".testimonial-carousel").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 1376, settings: { slidesToShow: 2 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } },
                ],
            }),
            e(".testimonial-carousel-2").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [{ breakpoint: 768, settings: { slidesToShow: 1 } }],
            }),
            e(".testimonial-carousel-3").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { slidesToShow: 2 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } },
                ],
            }),
            e(".brands-carousel").slick({
                dots: !1,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { arrows: !1, slidesToShow: 3 } },
                    { breakpoint: 361, settings: { arrows: !1, slidesToShow: 2 } },
                ],
            }),
        e(window).width() < 768 &&
        e(".brands-list").slick({
            dots: !1,
            arrows: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 2,
            slidesToScroll: 1,
            autoplay: !0,
            adaptiveHeight: !0,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>',
            responsive: [{ breakpoint: 361, settings: { arrows: !1, slidesToShow: 1 } }],
        }),
        e(window).width() < 768 &&
        e(".client-carousel").slick({
            dots: !1,
            arrows: !1,
            infinite: !0,
            speed: 300,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: !0,
            adaptiveHeight: !0,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>',
        }),
            e(".case-carousel").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { slidesToShow: 2 } },
                    { breakpoint: 768, settings: { slidesToShow: 1 } },
                ],
            }),
            e(".service-carousel").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 5,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 1367, settings: { arrows: !1, slidesToShow: 3, slidesToScroll: 1 } },
                    { breakpoint: 768, settings: { arrows: !1, slidesToShow: 2 } },
                    { breakpoint: 481, settings: { arrows: !1, slidesToShow: 1 } },
                ],
            }),
            e(".service-carousel-2").slick({
                dots: !0,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 4,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                centerMode: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 1367, settings: { arrows: !1, slidesToShow: 3, slidesToScroll: 1 } },
                    { breakpoint: 992, settings: { arrows: !1, slidesToShow: 2 } },
                    { breakpoint: 481, settings: { arrows: !1, slidesToShow: 1 } },
                ],
            }),
            e(".products-carousel").slick({
                dots: !1,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { arrows: !1, slidesToShow: 2 } },
                    { breakpoint: 481, settings: { arrows: !1, slidesToShow: 1 } },
                ],
            }),
        e(window).width() < 992 &&
        e(".portfolio-carousel").slick({
            dots: !1,
            arrows: !1,
            infinite: !0,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: !0,
            adaptiveHeight: !0,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>',
            responsive: [
                { breakpoint: 992, settings: { arrows: !1, slidesToShow: 2 } },
                { breakpoint: 481, settings: { arrows: !1, slidesToShow: 1 } },
            ],
        }),
            e(window).on("load", function () {
                var t = "fitRows";
                e(window).width() < 992 && (t = "masonry"), e(".gallery-items").isotope({ layoutMode: t });
            }),
            e(".gallery-nav li").on("click", function () {
                e(".gallery-nav li").removeClass("active"), e(this).addClass("active");
                var t = e(this).attr("data-filter");
                return e(".gallery-items").isotope({ filter: t, animationOptions: { duration: 750, easing: "linear", queue: !1 } }), !1;
            }),
            e(window).on("load", function () {
                e(".blog-masonry").isotope({ layoutMode: "masonry" });
            }),
        e(window).width() < 992 &&
        e(".pricing-carousel").slick({
            dots: !1,
            arrows: !1,
            infinite: !0,
            speed: 500,
            slidesToShow: 3,
            slidesToScroll: 1,
            autoplay: !0,
            adaptiveHeight: !0,
            prevArrow: '<i class="fa fa-angle-left"></i>',
            nextArrow: '<i class="fa fa-angle-right"></i>',
            responsive: [
                { breakpoint: 992, settings: { arrows: !1, slidesToShow: 2 } },
                { breakpoint: 768, settings: { arrows: !1, slidesToShow: 1 } },
            ],
        }),
            e(".blog-carousel").slick({
                dots: !1,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !0,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { arrows: !1, slidesToShow: 2 } },
                    { breakpoint: 481, settings: { arrows: !1, slidesToShow: 1 } },
                ],
            }),
            e(".blog-carousel-2").slick({
                dots: !1,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 2,
                slidesToScroll: 1,
                autoplay: !1,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 1025, settings: { slidesToShow: 2 } },
                    { breakpoint: 481, settings: { slidesToShow: 1 } },
                ],
            }),
            e(".team-carousel").slick({
                dots: !1,
                arrows: !1,
                infinite: !0,
                speed: 500,
                slidesToShow: 3,
                slidesToScroll: 1,
                autoplay: !1,
                adaptiveHeight: !0,
                prevArrow: '<i class="fa fa-angle-left"></i>',
                nextArrow: '<i class="fa fa-angle-right"></i>',
                responsive: [
                    { breakpoint: 992, settings: { slidesToShow: 2 } },
                    { breakpoint: 481, settings: { slidesToShow: 1 } },
                ],
            }),
            e("[data-countdown]").each(function () {
                var t = e(this),
                    n = e(this).data("countdown");
                t.countdown(n, function (e) {
                    t.html(
                        e.strftime(
                            '<span class="cdown days"><span class="time-count">%-D</span><p>/Days</p></span> <span class="cdown hour"><span class="time-count">%-H</span> <p>/Hour</p></span> <span class="cdown minutes"><span class="time-count">%M</span> <p>/Min</p></span> <span class="cdown second"> <span><span class="time-count">%S</span> <p>/Sec</p></span>'
                        )
                    );
                });
            }),
            e(".qtybutton").on("click", function () {
                var t = e(this),
                    n = t.parent().find("input").val();
                if ("+" == t.text()) var i = parseFloat(n) + 1;
                else if (n > 0) i = parseFloat(n) - 1;
                else i = 0;
                t.parent().find("input").val(i);
            });
        var t = e("#sticker"),
            n = t.position();
        e(window).on("scroll", function () {
            e(window).scrollTop() > n.top ? t.addClass("stick") : t.removeClass("stick");
        });
    })(jQuery);
// Special links
$('.special-action').on('click', function (){
    window.open($(this).data('target'),"_self");
});

$('.special-action-blank').on('click', function (){
    window.open($(this).data('target'), '_blank');
});
$(document).ready(function() {
    var currentUrl = window.location.href;
    $(".navbar-nav .nav-link").each(function() {
        var linkUrl = $(this).attr("href");
        if (currentUrl.indexOf(linkUrl) > -1) {
            $(this).addClass("active");
        }
    });
});
document.addEventListener("DOMContentLoaded", function () {
    const cookieConsent = document.getElementById("cookie-consent");
    const acceptButton = document.getElementById("accept-cookies");
    if (!Cookies.get("cookie-consent")) {
        cookieConsent.style.display = "block";
        acceptButton.addEventListener("click", function () {
            Cookies.set("cookie-consent", "accepted", { expires: 30 });
            cookieConsent.style.display = "none";
        });
    }
});
