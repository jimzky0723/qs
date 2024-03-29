var App = function() {
    var t, e = {
            animate: !1,
            popover: !0,
            assetsPath: "resources/tdh",
            imgPath: "img",
            jsPath: "js",
            libsPath: "lib",
            SlideSpeed: 200,
            megaMenuClass: "mai-mega-menu-container",
            megaMenuColumnClass: "mai-mega-menu-column",
            megaMenuSectionClass: "mai-mega-menu-section",
            navTabsClass: "mai-nav-tabs",
            subNavClass: "mai-sub-nav"
        },
        a = {};

    function i() {
        $(".nav-link, .dropdown-item", t).on("click", function(t) {
            var a, i, r, o = $(this),
                n = o.parent(),
                l = n.siblings(".open"),
                s = o.next("." + e.subNavClass),
                c = e.SlideSpeed;

            function d(t) {
                var a = $(t).parent(),
                    i = $(".nav-item.open, ." + e.megaMenuSectionClass + ".open", a);
                t.slideUp({
                    duration: c,
                    complete: function() {
                        a.removeClass("open"), i.removeClass("open"), $(this).removeAttr("style")
                    }
                })
            }
            $.isSm() ? (s.length && (n.hasClass("open") ? d(s) : (i = (a = s).parent(), r = !1, r = i.siblings(".open"), i.hasClass(e.megaMenuSectionClass) && (megaColumn = i.parent(), r = r.add(megaColumn.siblings().find("." + e.megaMenuSectionClass + ".open"))), r && d($("> ." + e.subNavClass, r)), a.slideDown({
                duration: c,
                complete: function() {
                    i.addClass("open"), $(this).removeAttr("style")
                }
            })), t.preventDefault()), t.stopPropagation()) : n.parent().hasClass("navbar-nav") && s.length && (l.removeClass("open"), n.addClass("open"), t.preventDefault())
        }), $(window).resize(function() {
            n(function() {
                var e;
                $.isSm() || (e = $(".navbar-nav > .nav-item", t)).filter(".open").length || e.filter(":first-child").addClass("open")
            }, 100, "sync_tabs")
        })
    }

    function r(t) {
        var e = $("<div>", {
                class: t
            }).appendTo("body"),
            a = e.css("background-color");
        return e.remove(), a
    }
    var o, n = (o = {}, function(t, e, a) {
        a || (a = "x1x2x3x4"), o[a] && clearTimeout(o[a]), o[a] = setTimeout(t, e)
    });
    return {
        conf: e,
        color: a,
        init: function(o) {
            document.getElementsByClassName(e.megaMenuClass), t = document.getElementsByClassName(e.navTabsClass), $.extend(e, o), a.primary = r("clr-primary"), a.success = r("clr-success"), a.info = r("clr-info"), a.warning = r("clr-warning"), a.danger = r("clr-danger"), a.grey = r("clr-grey"), a.dark = r("clr-dark"), a.light = r("clr-light"), a.black = r("clr-black"), i(), $(".mai-scroller").perfectScrollbar(), $(".mai-settings .dropdown-menu").on("click", function(t) {
                t.stopPropagation()
            }), $('[data-toggle="tooltip"]').tooltip(), $('[data-toggle="popover"]').popover()
        }
    }
}();
! function() {
    function t(e, a) {
        if (a = a || {}, (e = e || "") instanceof t) return e;
        if (!(this instanceof t)) return new t(e, a);
        var i, r, o, n, l, s, c, d, p = (r = {
            r: 0,
            g: 0,
            b: 0
        }, o = 1, n = !1, l = !1, "string" == typeof(i = e) && (i = function(t) {
            t = t.replace(A, "").replace(C, "").toLowerCase();
            var e, a, i = !1;
            if (H[t]) t = H[t], i = !0;
            else if ("transparent" == t) return {
                r: 0,
                g: 0,
                b: 0,
                a: 0,
                format: "name"
            };
            return (e = z.rgb.exec(t)) ? {
                r: e[1],
                g: e[2],
                b: e[3]
            } : (e = z.rgba.exec(t)) ? {
                r: e[1],
                g: e[2],
                b: e[3],
                a: e[4]
            } : (e = z.hsl.exec(t)) ? {
                h: e[1],
                s: e[2],
                l: e[3]
            } : (e = z.hsla.exec(t)) ? {
                h: e[1],
                s: e[2],
                l: e[3],
                a: e[4]
            } : (e = z.hsv.exec(t)) ? {
                h: e[1],
                s: e[2],
                v: e[3]
            } : (e = z.hsva.exec(t)) ? {
                h: e[1],
                s: e[2],
                v: e[3],
                a: e[4]
            } : (e = z.hex8.exec(t)) ? {
                a: (a = e[1], w(a) / 255),
                r: w(e[2]),
                g: w(e[3]),
                b: w(e[4]),
                format: i ? "name" : "hex8"
            } : (e = z.hex6.exec(t)) ? {
                r: w(e[1]),
                g: w(e[2]),
                b: w(e[3]),
                format: i ? "name" : "hex"
            } : !!(e = z.hex3.exec(t)) && {
                r: w(e[1] + "" + e[1]),
                g: w(e[2] + "" + e[2]),
                b: w(e[3] + "" + e[3]),
                format: i ? "name" : "hex"
            }
        }(i)), "object" == typeof i && (i.hasOwnProperty("r") && i.hasOwnProperty("g") && i.hasOwnProperty("b") ? (s = i.r, c = i.g, d = i.b, r = {
            r: 255 * v(s, 255),
            g: 255 * v(c, 255),
            b: 255 * v(d, 255)
        }, n = !0, l = "%" === String(i.r).substr(-1) ? "prgb" : "rgb") : i.hasOwnProperty("h") && i.hasOwnProperty("s") && i.hasOwnProperty("v") ? (i.s = x(i.s), i.v = x(i.v), r = function(t, e, a) {
            t = 6 * v(t, 360), e = v(e, 100), a = v(a, 100);
            var i = _.floor(t),
                r = t - i,
                o = a * (1 - e),
                n = a * (1 - r * e),
                l = a * (1 - (1 - r) * e),
                s = i % 6;
            return {
                r: 255 * [a, n, o, o, l, a][s],
                g: 255 * [l, a, a, n, o, o][s],
                b: 255 * [o, o, l, a, a, n][s]
            }
        }(i.h, i.s, i.v), n = !0, l = "hsv") : i.hasOwnProperty("h") && i.hasOwnProperty("s") && i.hasOwnProperty("l") && (i.s = x(i.s), i.l = x(i.l), r = function(t, e, a) {
            function i(t, e, a) {
                return 0 > a && (a += 1), a > 1 && (a -= 1), 1 / 6 > a ? t + 6 * (e - t) * a : .5 > a ? e : 2 / 3 > a ? t + 6 * (e - t) * (2 / 3 - a) : t
            }
            var r, o, n;
            if (t = v(t, 360), e = v(e, 100), a = v(a, 100), 0 === e) r = o = n = a;
            else {
                var l = .5 > a ? a * (1 + e) : a + e - a * e,
                    s = 2 * a - l;
                r = i(s, l, t + 1 / 3), o = i(s, l, t), n = i(s, l, t - 1 / 3)
            }
            return {
                r: 255 * r,
                g: 255 * o,
                b: 255 * n
            }
        }(i.h, i.s, i.l), n = !0, l = "hsl"), i.hasOwnProperty("a") && (o = i.a)), o = y(o), {
            ok: n,
            format: i.format || l,
            r: F(255, T(r.r, 0)),
            g: F(255, T(r.g, 0)),
            b: F(255, T(r.b, 0)),
            a: o
        });
        this._originalInput = e, this._r = p.r, this._g = p.g, this._b = p.b, this._a = p.a, this._roundA = M(100 * this._a) / 100, this._format = a.format || p.format, this._gradientType = a.gradientType, this._r < 1 && (this._r = M(this._r)), this._g < 1 && (this._g = M(this._g)), this._b < 1 && (this._b = M(this._b)), this._ok = p.ok, this._tc_id = S++
    }

    function e(t, e, a) {
        t = v(t, 255), e = v(e, 255), a = v(a, 255);
        var i, r, o = T(t, e, a),
            n = F(t, e, a),
            l = (o + n) / 2;
        if (o == n) i = r = 0;
        else {
            var s = o - n;
            switch (r = l > .5 ? s / (2 - o - n) : s / (o + n), o) {
                case t:
                    i = (e - a) / s + (a > e ? 6 : 0);
                    break;
                case e:
                    i = (a - t) / s + 2;
                    break;
                case a:
                    i = (t - e) / s + 4
            }
            i /= 6
        }
        return {
            h: i,
            s: r,
            l: l
        }
    }

    function a(t, e, a) {
        t = v(t, 255), e = v(e, 255), a = v(a, 255);
        var i, r, o = T(t, e, a),
            n = F(t, e, a),
            l = o,
            s = o - n;
        if (r = 0 === o ? 0 : s / o, o == n) i = 0;
        else {
            switch (o) {
                case t:
                    i = (e - a) / s + (a > e ? 6 : 0);
                    break;
                case e:
                    i = (a - t) / s + 2;
                    break;
                case a:
                    i = (t - e) / s + 4
            }
            i /= 6
        }
        return {
            h: i,
            s: r,
            v: l
        }
    }

    function i(t, e, a, i) {
        var r = [$(M(t).toString(16)), $(M(e).toString(16)), $(M(a).toString(16))];
        return i && r[0].charAt(0) == r[0].charAt(1) && r[1].charAt(0) == r[1].charAt(1) && r[2].charAt(0) == r[2].charAt(1) ? r[0].charAt(0) + r[1].charAt(0) + r[2].charAt(0) : r.join("")
    }

    function r(t, e, a, i) {
        var r;
        return [$((r = i, Math.round(255 * parseFloat(r)).toString(16))), $(M(t).toString(16)), $(M(e).toString(16)), $(M(a).toString(16))].join("")
    }

    function o(e, a) {
        a = 0 === a ? 0 : a || 10;
        var i = t(e).toHsl();
        return i.s -= a / 100, i.s = k(i.s), t(i)
    }

    function n(e, a) {
        a = 0 === a ? 0 : a || 10;
        var i = t(e).toHsl();
        return i.s += a / 100, i.s = k(i.s), t(i)
    }

    function l(e) {
        return t(e).desaturate(100)
    }

    function s(e, a) {
        a = 0 === a ? 0 : a || 10;
        var i = t(e).toHsl();
        return i.l += a / 100, i.l = k(i.l), t(i)
    }

    function c(e, a) {
        a = 0 === a ? 0 : a || 10;
        var i = t(e).toRgb();
        return i.r = T(0, F(255, i.r - M(-a / 100 * 255))), i.g = T(0, F(255, i.g - M(-a / 100 * 255))), i.b = T(0, F(255, i.b - M(-a / 100 * 255))), t(i)
    }

    function d(e, a) {
        a = 0 === a ? 0 : a || 10;
        var i = t(e).toHsl();
        return i.l -= a / 100, i.l = k(i.l), t(i)
    }

    function p(e, a) {
        var i = t(e).toHsl(),
            r = (M(i.h) + a) % 360;
        return i.h = 0 > r ? 360 + r : r, t(i)
    }

    function h(e) {
        var a = t(e).toHsl();
        return a.h = (a.h + 180) % 360, t(a)
    }

    function u(e) {
        var a = t(e).toHsl(),
            i = a.h;
        return [t(e), t({
            h: (i + 120) % 360,
            s: a.s,
            l: a.l
        }), t({
            h: (i + 240) % 360,
            s: a.s,
            l: a.l
        })]
    }

    function g(e) {
        var a = t(e).toHsl(),
            i = a.h;
        return [t(e), t({
            h: (i + 90) % 360,
            s: a.s,
            l: a.l
        }), t({
            h: (i + 180) % 360,
            s: a.s,
            l: a.l
        }), t({
            h: (i + 270) % 360,
            s: a.s,
            l: a.l
        })]
    }

    function f(e) {
        var a = t(e).toHsl(),
            i = a.h;
        return [t(e), t({
            h: (i + 72) % 360,
            s: a.s,
            l: a.l
        }), t({
            h: (i + 216) % 360,
            s: a.s,
            l: a.l
        })]
    }

    function m(e, a, i) {
        a = a || 6, i = i || 30;
        var r = t(e).toHsl(),
            o = 360 / i,
            n = [t(e)];
        for (r.h = (r.h - (o * a >> 1) + 720) % 360; --a;) r.h = (r.h + o) % 360, n.push(t(r));
        return n
    }

    function b(e, a) {
        a = a || 6;
        for (var i = t(e).toHsv(), r = i.h, o = i.s, n = i.v, l = [], s = 1 / a; a--;) l.push(t({
            h: r,
            s: o,
            v: n
        })), n = (n + s) % 1;
        return l
    }

    function y(t) {
        return t = parseFloat(t), (isNaN(t) || 0 > t || t > 1) && (t = 1), t
    }

    function v(t, e) {
        var a;
        "string" == typeof(a = t) && -1 != a.indexOf(".") && 1 === parseFloat(a) && (t = "100%");
        var i, r = "string" == typeof(i = t) && -1 != i.indexOf("%");
        return t = F(e, T(0, parseFloat(t))), r && (t = parseInt(t * e, 10) / 100), _.abs(t - e) < 1e-6 ? 1 : t % e / parseFloat(e)
    }

    function k(t) {
        return F(1, T(0, t))
    }

    function w(t) {
        return parseInt(t, 16)
    }

    function $(t) {
        return 1 == t.length ? "0" + t : "" + t
    }

    function x(t) {
        return 1 >= t && (t = 100 * t + "%"), t
    }
    var A = /^[\s,#]+/,
        C = /\s+$/,
        S = 0,
        _ = Math,
        M = _.round,
        F = _.min,
        T = _.max,
        R = _.random;
    t.prototype = {
        isDark: function() {
            return this.getBrightness() < 128
        },
        isLight: function() {
            return !this.isDark()
        },
        isValid: function() {
            return this._ok
        },
        getOriginalInput: function() {
            return this._originalInput
        },
        getFormat: function() {
            return this._format
        },
        getAlpha: function() {
            return this._a
        },
        getBrightness: function() {
            var t = this.toRgb();
            return (299 * t.r + 587 * t.g + 114 * t.b) / 1e3
        },
        getLuminance: function() {
            var t, e, a, i = this.toRgb();
            return t = i.r / 255, e = i.g / 255, a = i.b / 255, .2126 * (.03928 >= t ? t / 12.92 : Math.pow((t + .055) / 1.055, 2.4)) + .7152 * (.03928 >= e ? e / 12.92 : Math.pow((e + .055) / 1.055, 2.4)) + .0722 * (.03928 >= a ? a / 12.92 : Math.pow((a + .055) / 1.055, 2.4))
        },
        setAlpha: function(t) {
            return this._a = y(t), this._roundA = M(100 * this._a) / 100, this
        },
        toHsv: function() {
            var t = a(this._r, this._g, this._b);
            return {
                h: 360 * t.h,
                s: t.s,
                v: t.v,
                a: this._a
            }
        },
        toHsvString: function() {
            var t = a(this._r, this._g, this._b),
                e = M(360 * t.h),
                i = M(100 * t.s),
                r = M(100 * t.v);
            return 1 == this._a ? "hsv(" + e + ", " + i + "%, " + r + "%)" : "hsva(" + e + ", " + i + "%, " + r + "%, " + this._roundA + ")"
        },
        toHsl: function() {
            var t = e(this._r, this._g, this._b);
            return {
                h: 360 * t.h,
                s: t.s,
                l: t.l,
                a: this._a
            }
        },
        toHslString: function() {
            var t = e(this._r, this._g, this._b),
                a = M(360 * t.h),
                i = M(100 * t.s),
                r = M(100 * t.l);
            return 1 == this._a ? "hsl(" + a + ", " + i + "%, " + r + "%)" : "hsla(" + a + ", " + i + "%, " + r + "%, " + this._roundA + ")"
        },
        toHex: function(t) {
            return i(this._r, this._g, this._b, t)
        },
        toHexString: function(t) {
            return "#" + this.toHex(t)
        },
        toHex8: function() {
            return r(this._r, this._g, this._b, this._a)
        },
        toHex8String: function() {
            return "#" + this.toHex8()
        },
        toRgb: function() {
            return {
                r: M(this._r),
                g: M(this._g),
                b: M(this._b),
                a: this._a
            }
        },
        toRgbString: function() {
            return 1 == this._a ? "rgb(" + M(this._r) + ", " + M(this._g) + ", " + M(this._b) + ")" : "rgba(" + M(this._r) + ", " + M(this._g) + ", " + M(this._b) + ", " + this._roundA + ")"
        },
        toPercentageRgb: function() {
            return {
                r: M(100 * v(this._r, 255)) + "%",
                g: M(100 * v(this._g, 255)) + "%",
                b: M(100 * v(this._b, 255)) + "%",
                a: this._a
            }
        },
        toPercentageRgbString: function() {
            return 1 == this._a ? "rgb(" + M(100 * v(this._r, 255)) + "%, " + M(100 * v(this._g, 255)) + "%, " + M(100 * v(this._b, 255)) + "%)" : "rgba(" + M(100 * v(this._r, 255)) + "%, " + M(100 * v(this._g, 255)) + "%, " + M(100 * v(this._b, 255)) + "%, " + this._roundA + ")"
        },
        toName: function() {
            return 0 === this._a ? "transparent" : !(this._a < 1) && (L[i(this._r, this._g, this._b, !0)] || !1)
        },
        toFilter: function(e) {
            var a = "#" + r(this._r, this._g, this._b, this._a),
                i = a,
                o = this._gradientType ? "GradientType = 1, " : "";
            e && (i = t(e).toHex8String());
            return "progid:DXImageTransform.Microsoft.gradient(" + o + "startColorstr=" + a + ",endColorstr=" + i + ")"
        },
        toString: function(t) {
            var e = !!t;
            t = t || this._format;
            var a = !1,
                i = this._a < 1 && this._a >= 0;
            return !e && i && ("hex" === t || "hex6" === t || "hex3" === t || "name" === t) ? "name" === t && 0 === this._a ? this.toName() : this.toRgbString() : ("rgb" === t && (a = this.toRgbString()), "prgb" === t && (a = this.toPercentageRgbString()), ("hex" === t || "hex6" === t) && (a = this.toHexString()), "hex3" === t && (a = this.toHexString(!0)), "hex8" === t && (a = this.toHex8String()), "name" === t && (a = this.toName()), "hsl" === t && (a = this.toHslString()), "hsv" === t && (a = this.toHsvString()), a || this.toHexString())
        },
        _applyModification: function(t, e) {
            var a = t.apply(null, [this].concat([].slice.call(e)));
            return this._r = a._r, this._g = a._g, this._b = a._b, this.setAlpha(a._a), this
        },
        lighten: function() {
            return this._applyModification(s, arguments)
        },
        brighten: function() {
            return this._applyModification(c, arguments)
        },
        darken: function() {
            return this._applyModification(d, arguments)
        },
        desaturate: function() {
            return this._applyModification(o, arguments)
        },
        saturate: function() {
            return this._applyModification(n, arguments)
        },
        greyscale: function() {
            return this._applyModification(l, arguments)
        },
        spin: function() {
            return this._applyModification(p, arguments)
        },
        _applyCombination: function(t, e) {
            return t.apply(null, [this].concat([].slice.call(e)))
        },
        analogous: function() {
            return this._applyCombination(m, arguments)
        },
        complement: function() {
            return this._applyCombination(h, arguments)
        },
        monochromatic: function() {
            return this._applyCombination(b, arguments)
        },
        splitcomplement: function() {
            return this._applyCombination(f, arguments)
        },
        triad: function() {
            return this._applyCombination(u, arguments)
        },
        tetrad: function() {
            return this._applyCombination(g, arguments)
        }
    }, t.fromRatio = function(e, a) {
        if ("object" == typeof e) {
            var i = {};
            for (var r in e) e.hasOwnProperty(r) && (i[r] = "a" === r ? e[r] : x(e[r]));
            e = i
        }
        return t(e, a)
    }, t.equals = function(e, a) {
        return !(!e || !a) && t(e).toRgbString() == t(a).toRgbString()
    }, t.random = function() {
        return t.fromRatio({
            r: R(),
            g: R(),
            b: R()
        })
    }, t.mix = function(e, a, i) {
        i = 0 === i ? 0 : i || 50;
        var r, o = t(e).toRgb(),
            n = t(a).toRgb(),
            l = i / 100,
            s = 2 * l - 1,
            c = n.a - o.a,
            d = 1 - (r = ((r = -1 == s * c ? s : (s + c) / (1 + s * c)) + 1) / 2);
        return t({
            r: n.r * r + o.r * d,
            g: n.g * r + o.g * d,
            b: n.b * r + o.b * d,
            a: n.a * l + o.a * (1 - l)
        })
    }, t.readability = function(e, a) {
        var i = t(e),
            r = t(a);
        return (Math.max(i.getLuminance(), r.getLuminance()) + .05) / (Math.min(i.getLuminance(), r.getLuminance()) + .05)
    }, t.isReadable = function(e, a, i) {
        var r, o, n, l, s, c = t.readability(e, a);
        switch (o = !1, "AA" !== (l = ((n = (n = i) || {
            level: "AA",
            size: "small"
        }).level || "AA").toUpperCase()) && "AAA" !== l && (l = "AA"), "small" !== (s = (n.size || "small").toLowerCase()) && "large" !== s && (s = "small"), (r = {
            level: l,
            size: s
        }).level + r.size) {
            case "AAsmall":
            case "AAAlarge":
                o = c >= 4.5;
                break;
            case "AAlarge":
                o = c >= 3;
                break;
            case "AAAsmall":
                o = c >= 7
        }
        return o
    }, t.mostReadable = function(e, a, i) {
        var r, o, n, l, s = null,
            c = 0;
        o = (i = i || {}).includeFallbackColors, n = i.level, l = i.size;
        for (var d = 0; d < a.length; d++)(r = t.readability(e, a[d])) > c && (c = r, s = t(a[d]));
        return t.isReadable(e, s, {
            level: n,
            size: l
        }) || !o ? s : (i.includeFallbackColors = !1, t.mostReadable(e, ["#fff", "#000"], i))
    };
    var P, D, B, H = t.names = {
            aliceblue: "f0f8ff",
            antiquewhite: "faebd7",
            aqua: "0ff",
            aquamarine: "7fffd4",
            azure: "f0ffff",
            beige: "f5f5dc",
            bisque: "ffe4c4",
            black: "000",
            blanchedalmond: "ffebcd",
            blue: "00f",
            blueviolet: "8a2be2",
            brown: "a52a2a",
            burlywood: "deb887",
            burntsienna: "ea7e5d",
            cadetblue: "5f9ea0",
            chartreuse: "7fff00",
            chocolate: "d2691e",
            coral: "ff7f50",
            cornflowerblue: "6495ed",
            cornsilk: "fff8dc",
            crimson: "dc143c",
            cyan: "0ff",
            darkblue: "00008b",
            darkcyan: "008b8b",
            darkgoldenrod: "b8860b",
            darkgray: "a9a9a9",
            darkgreen: "006400",
            darkgrey: "a9a9a9",
            darkkhaki: "bdb76b",
            darkmagenta: "8b008b",
            darkolivegreen: "556b2f",
            darkorange: "ff8c00",
            darkorchid: "9932cc",
            darkred: "8b0000",
            darksalmon: "e9967a",
            darkseagreen: "8fbc8f",
            darkslateblue: "483d8b",
            darkslategray: "2f4f4f",
            darkslategrey: "2f4f4f",
            darkturquoise: "00ced1",
            darkviolet: "9400d3",
            deeppink: "ff1493",
            deepskyblue: "00bfff",
            dimgray: "696969",
            dimgrey: "696969",
            dodgerblue: "1e90ff",
            firebrick: "b22222",
            floralwhite: "fffaf0",
            forestgreen: "228b22",
            fuchsia: "f0f",
            gainsboro: "dcdcdc",
            ghostwhite: "f8f8ff",
            gold: "ffd700",
            goldenrod: "daa520",
            gray: "808080",
            green: "008000",
            greenyellow: "adff2f",
            grey: "808080",
            honeydew: "f0fff0",
            hotpink: "ff69b4",
            indianred: "cd5c5c",
            indigo: "4b0082",
            ivory: "fffff0",
            khaki: "f0e68c",
            lavender: "e6e6fa",
            lavenderblush: "fff0f5",
            lawngreen: "7cfc00",
            lemonchiffon: "fffacd",
            lightblue: "add8e6",
            lightcoral: "f08080",
            lightcyan: "e0ffff",
            lightgoldenrodyellow: "fafad2",
            lightgray: "d3d3d3",
            lightgreen: "90ee90",
            lightgrey: "d3d3d3",
            lightpink: "ffb6c1",
            lightsalmon: "ffa07a",
            lightseagreen: "20b2aa",
            lightskyblue: "87cefa",
            lightslategray: "789",
            lightslategrey: "789",
            lightsteelblue: "b0c4de",
            lightyellow: "ffffe0",
            lime: "0f0",
            limegreen: "32cd32",
            linen: "faf0e6",
            magenta: "f0f",
            maroon: "800000",
            mediumaquamarine: "66cdaa",
            mediumblue: "0000cd",
            mediumorchid: "ba55d3",
            mediumpurple: "9370db",
            mediumseagreen: "3cb371",
            mediumslateblue: "7b68ee",
            mediumspringgreen: "00fa9a",
            mediumturquoise: "48d1cc",
            mediumvioletred: "c71585",
            midnightblue: "191970",
            mintcream: "f5fffa",
            mistyrose: "ffe4e1",
            moccasin: "ffe4b5",
            navajowhite: "ffdead",
            navy: "000080",
            oldlace: "fdf5e6",
            olive: "808000",
            olivedrab: "6b8e23",
            orange: "ffa500",
            orangered: "ff4500",
            orchid: "da70d6",
            palegoldenrod: "eee8aa",
            palegreen: "98fb98",
            paleturquoise: "afeeee",
            palevioletred: "db7093",
            papayawhip: "ffefd5",
            peachpuff: "ffdab9",
            peru: "cd853f",
            pink: "ffc0cb",
            plum: "dda0dd",
            powderblue: "b0e0e6",
            purple: "800080",
            rebeccapurple: "663399",
            red: "f00",
            rosybrown: "bc8f8f",
            royalblue: "4169e1",
            saddlebrown: "8b4513",
            salmon: "fa8072",
            sandybrown: "f4a460",
            seagreen: "2e8b57",
            seashell: "fff5ee",
            sienna: "a0522d",
            silver: "c0c0c0",
            skyblue: "87ceeb",
            slateblue: "6a5acd",
            slategray: "708090",
            slategrey: "708090",
            snow: "fffafa",
            springgreen: "00ff7f",
            steelblue: "4682b4",
            tan: "d2b48c",
            teal: "008080",
            thistle: "d8bfd8",
            tomato: "ff6347",
            turquoise: "40e0d0",
            violet: "ee82ee",
            wheat: "f5deb3",
            white: "fff",
            whitesmoke: "f5f5f5",
            yellow: "ff0",
            yellowgreen: "9acd32"
        },
        L = t.hexNames = function(t) {
            var e = {};
            for (var a in t) t.hasOwnProperty(a) && (e[t[a]] = a);
            return e
        }(H),
        z = (D = "[\\s|\\(]+(" + (P = "(?:[-\\+]?\\d*\\.\\d+%?)|(?:[-\\+]?\\d+%?)") + ")[,|\\s]+(" + P + ")[,|\\s]+(" + P + ")\\s*\\)?", B = "[\\s|\\(]+(" + P + ")[,|\\s]+(" + P + ")[,|\\s]+(" + P + ")[,|\\s]+(" + P + ")\\s*\\)?", {
            rgb: new RegExp("rgb" + D),
            rgba: new RegExp("rgba" + B),
            hsl: new RegExp("hsl" + D),
            hsla: new RegExp("hsla" + B),
            hsv: new RegExp("hsv" + D),
            hsva: new RegExp("hsva" + B),
            hex3: /^([0-9a-fA-F]{1})([0-9a-fA-F]{1})([0-9a-fA-F]{1})$/,
            hex6: /^([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/,
            hex8: /^([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})([0-9a-fA-F]{2})$/
        });
    "undefined" != typeof module && module.exports ? module.exports = t : "function" == typeof define && define.amd ? define(function() {
        return t
    }) : window.tinycolor = t
}(),
    function(t) {
        t.isBreakpoint = function(e) {
            var a, i, r;
            switch (e) {
                case "xs":
                    r = "d-none d-sm-block";
                    break;
                case "sm":
                    r = "d-none d-md-block";
                    break;
                case "md":
                    r = "d-none d-lg-block";
                    break;
                case "lg":
                    r = "d-none d-xl-block";
                    break;
                case "xl":
                    r = "d-none"
            }
            return i = (a = t("<div/>", {
                class: r
            }).appendTo("body")).is(":hidden"), a.remove(), i
        }, t.extend(t, {
            isXs: function() {
                return t.isBreakpoint("xs")
            },
            isSm: function() {
                return t.isBreakpoint("sm")
            },
            isMd: function() {
                return t.isBreakpoint("md")
            },
            isLg: function() {
                return t.isBreakpoint("lg")
            },
            isXl: function() {
                return t.isBreakpoint("xl")
            }
        })
    }(jQuery);
App = function() {
    "use strict";
    return App.ChartJs = function() {
        var t, e, a, i, r, o, n, l, s, c, d, p, h, u, g, f, m, b, y, v, k, w, $, x, A, C, S = function() {
            return Math.round(100 * Math.random())
        };
        t = tinycolor(App.color.primary), e = tinycolor(App.color.primary).lighten(22), a = document.getElementById("line-chart"), i = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "My First dataset",
                borderColor: t.toString(),
                backgroundColor: t.setAlpha(.8).toString(),
                data: [S(), S(), S(), S(), S(), S(), S()]
            }, {
                label: "My Second dataset",
                borderColor: e.toString(),
                backgroundColor: e.setAlpha(.5).toString(),
                data: [S(), S(), S(), S(), S(), S(), S()]
            }]
        }, new Chart(a, {
            type: "line",
            data: i
        }), r = tinycolor(App.color.primary), o = tinycolor(App.color.primary).lighten(22), n = document.getElementById("bar-chart"), l = {
            labels: ["January", "February", "March", "April", "May", "June", "July"],
            datasets: [{
                label: "Credit",
                borderColor: r.toString(),
                backgroundColor: r.setAlpha(.8).toString(),
                data: [S(), S(), S(), S(), S(), S(), S()]
            }, {
                label: "Debit",
                borderColor: o.toString(),
                backgroundColor: o.setAlpha(.5).toString(),
                data: [S(), S(), S(), S(), S(), S(), S()]
            }]
        }, new Chart(n, {
            type: "bar",
            data: l,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: "rgb(0, 255, 0)",
                        borderSkipped: "bottom"
                    }
                }
            }
        }), s = tinycolor(App.color.primary).lighten(30), c = tinycolor(App.color.primary), d = document.getElementById("radar-chart"), p = {
            labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
            datasets: [{
                label: "First Year",
                backgroundColor: s.setAlpha(.3).toString(),
                borderColor: s.toString(),
                pointBackgroundColor: s.toString(),
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: s.toString(),
                data: [65, 59, 90, 81, 56, 55, 40]
            }, {
                label: "Second Year",
                backgroundColor: c.setAlpha(.4).toString(),
                borderColor: c.toString(),
                pointBackgroundColor: c.toString(),
                pointBorderColor: "#fff",
                pointHoverBackgroundColor: "#fff",
                pointHoverBorderColor: c.toString(),
                data: [28, 48, 40, 19, 96, 27, 100]
            }]
        }, new Chart(d, {
            type: "radar",
            data: p
        }), h = App.color.primary, u = tinycolor(App.color.primary).lighten(10).toString(), g = tinycolor(App.color.primary).lighten(20).toString(), f = tinycolor(App.color.primary).lighten(30).toString(), m = tinycolor(App.color.primary).lighten(40).toString(), b = document.getElementById("polar-chart"), new Chart(b, {
            type: "polarArea",
            data: {
                datasets: [{
                    data: [11, 16, 14, 7, 14],
                    backgroundColor: [h, u, g, f, m],
                    label: "My dataset"
                }],
                labels: ["January", "February", "March", "April", "May"]
            }
        }), y = App.color.primary, v = tinycolor(App.color.primary).lighten(12).toString(), k = tinycolor(App.color.primary).lighten(22).toString(), w = document.getElementById("pie-chart"), new Chart(w, {
            type: "pie",
            data: {
                labels: ["Red", "Blue", "Yellow"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: [y, v, k],
                    hoverBackgroundColor: [y, v, k]
                }]
            }
        }), $ = App.color.primary, x = tinycolor(App.color.primary).lighten(12).toString(), A = tinycolor(App.color.primary).lighten(22).toString(), C = document.getElementById("donut-chart"), new Chart(C, {
            type: "doughnut",
            data: {
                labels: ["Red", "Blue", "Yellow"],
                datasets: [{
                    data: [300, 50, 100],
                    backgroundColor: [$, x, A],
                    hoverBackgroundColor: [$, x, A]
                }]
            }
        })
    }, App
}(), App = function() {
    "use strict";
    return App.chartsMorris = function() {
        var t, e, a, i, r, o, n, l, s, c, d = [{
            period: "2013",
            licensed: 400,
            sorned: 550
        }, {
            period: "2012",
            licensed: 450,
            sorned: 400
        }, {
            period: "2011",
            licensed: 350,
            sorned: 550
        }, {
            period: "2010",
            licensed: 500,
            sorned: 700
        }, {
            period: "2009",
            licensed: 250,
            sorned: 380
        }, {
            period: "2008",
            licensed: 350,
            sorned: 240
        }, {
            period: "2007",
            licensed: 180,
            sorned: 300
        }, {
            period: "2006",
            licensed: 300,
            sorned: 250
        }, {
            period: "2005",
            licensed: 200,
            sorned: 150
        }];
        t = App.color.primary, e = tinycolor(App.color.primary).lighten(15).toString(), new Morris.Line({
            element: "line-chart",
            data: d,
            xkey: "period",
            ykeys: ["licensed", "sorned"],
            labels: ["Licensed", "Off the road"],
            lineColors: [t, e]
        }), a = tinycolor(App.color.primary).lighten(15).toString(), i = tinycolor(App.color.primary).brighten(3).toString(), Morris.Bar({
            element: "bar-chart",
            data: [{
                device: "iPhone",
                geekbench: 136,
                macbench: 180
            }, {
                device: "iPhone 3G",
                geekbench: 137,
                macbench: 200
            }, {
                device: "iPhone 3GS",
                geekbench: 275,
                macbench: 350
            }, {
                device: "iPhone 4",
                geekbench: 380,
                macbench: 500
            }, {
                device: "iPhone 4S",
                geekbench: 655,
                macbench: 900
            }, {
                device: "iPhone 5",
                geekbench: 1571,
                macbench: 1700
            }],
            xkey: "device",
            ykeys: ["geekbench", "macbench"],
            labels: ["Geekbench", "Macbench"],
            barColors: [a, i],
            barRatio: .4,
            xLabelAngle: 35,
            hideHover: "auto"
        }), r = App.color.primary, o = tinycolor(App.color.primary).lighten(20), n = tinycolor(App.color.primary).lighten(10), Morris.Donut({
            element: "donut-chart",
            data: [{
                label: "Investment",
                value: 50
            }, {
                label: "Savings",
                value: 30
            }, {
                label: "Outgoings",
                value: 20
            }],
            colors: [r, o, n],
            formatter: function(t) {
                return t + "%"
            }
        }), l = App.color.primary, s = tinycolor(App.color.primary).lighten(10).toString(), c = tinycolor(App.color.primary).lighten(20).toString(), Morris.Area({
            element: "area-chart",
            data: [{
                period: "2010 Q1",
                iphone: 2666,
                ipad: null,
                itouch: 2647
            }, {
                period: "2010 Q2",
                iphone: 2778,
                ipad: 2294,
                itouch: 2441
            }, {
                period: "2010 Q3",
                iphone: 4912,
                ipad: 1969,
                itouch: 2501
            }, {
                period: "2010 Q4",
                iphone: 3767,
                ipad: 3597,
                itouch: 5689
            }, {
                period: "2011 Q1",
                iphone: 6810,
                ipad: 1914,
                itouch: 2293
            }, {
                period: "2011 Q2",
                iphone: 5670,
                ipad: 4293,
                itouch: 1881
            }, {
                period: "2011 Q3",
                iphone: 4820,
                ipad: 3795,
                itouch: 1588
            }, {
                period: "2011 Q4",
                iphone: 15073,
                ipad: 5967,
                itouch: 5175
            }, {
                period: "2012 Q1",
                iphone: 10687,
                ipad: 4460,
                itouch: 2028
            }, {
                period: "2012 Q2",
                iphone: 8432,
                ipad: 5713,
                itouch: 1791
            }],
            xkey: "period",
            ykeys: ["iphone", "ipad", "itouch"],
            labels: ["iPhone", "iPad", "iPod Touch"],
            lineColors: [l, s, c],
            pointSize: 2,
            hideHover: "auto"
        })
    }, App
}(), App = function() {
    "use strict";
    return App.chartsSparklines = function() {
        var t = App.color.primary,
            e = App.color.warning,
            a = App.color.success,
            i = App.color.danger;
        $("#spark1").sparkline("html", {
            width: "85",
            height: "35",
            lineColor: t,
            highlightSpotColor: t,
            highlightLineColor: t,
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.15
        }), $("#spark2").sparkline("html", {
            type: "bar",
            width: "85",
            height: "35",
            barWidth: 3,
            barSpacing: 3,
            chartRangeMin: 0,
            barColor: e
        }), $("#spark3").sparkline("html", {
            type: "discrete",
            width: "85",
            height: "35",
            lineHeight: 20,
            lineColor: a,
            xwidth: 18
        }), $("#spark4").sparkline("html", {
            width: "85",
            height: "35",
            lineColor: i,
            highlightSpotColor: i,
            highlightLineColor: i,
            fillColor: !1,
            spotColor: !1,
            minSpotColor: !1,
            maxSpotColor: !1,
            lineWidth: 1.15
        });
        var r = tinycolor(App.color.primary),
            o = tinycolor(App.color.danger),
            n = tinycolor(App.color.warning),
            l = tinycolor(App.color.success);
        t = r.toString(), e = o.toString(), a = n.toString(), i = l.toString();
        $.fn.sparkline.defaults.common.lineColor = t, $.fn.sparkline.defaults.common.fillColor = r.setAlpha(.3).toString(), $.fn.sparkline.defaults.line.spotColor = t, $.fn.sparkline.defaults.line.minSpotColor = t, $.fn.sparkline.defaults.line.maxSpotColor = t, $.fn.sparkline.defaults.line.highlightSpotColor = t, $.fn.sparkline.defaults.line.highlightLineColor = t, $.fn.sparkline.defaults.bar.barColor = t, $.fn.sparkline.defaults.bar.negBarColor = e, $.fn.sparkline.defaults.bar.stackedBarColor[0] = t, $.fn.sparkline.defaults.bar.stackedBarColor[1] = e, $.fn.sparkline.defaults.tristate.posBarColor = t, $.fn.sparkline.defaults.tristate.negBarColor = e, $.fn.sparkline.defaults.discrete.thresholdColor = e, $.fn.sparkline.defaults.bullet.targetColor = t, $.fn.sparkline.defaults.bullet.performanceColor = e, $.fn.sparkline.defaults.bullet.rangeColors[0] = o.setAlpha(.2).toString(), $.fn.sparkline.defaults.bullet.rangeColors[1] = o.setAlpha(.5).toString(), $.fn.sparkline.defaults.bullet.rangeColors[2] = o.setAlpha(.45).toString(), $.fn.sparkline.defaults.pie.sliceColors[0] = t, $.fn.sparkline.defaults.pie.sliceColors[1] = e, $.fn.sparkline.defaults.pie.sliceColors[2] = a, $.fn.sparkline.defaults.box.medianColor = t, $.fn.sparkline.defaults.box.boxFillColor = o.setAlpha(.5).toString(), $.fn.sparkline.defaults.box.boxLineColor = t, $.fn.sparkline.defaults.box.whiskerColor = i, $(".compositebar").sparkline("html", {
            type: "bar",
            barColor: e
        }), $(".compositebar").sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
            composite: !0,
            fillColor: !1
        }), $(".sparklinebasic").sparkline(), $(".linecustom").sparkline("html", {
            height: "1.5em",
            width: "8em",
            lineColor: a,
            fillColor: n.setAlpha(.4).toString(),
            minSpotColor: !1,
            maxSpotColor: !1,
            spotColor: i,
            spotRadius: 3
        }), $(".sparkbar").sparkline("html", {
            type: "bar"
        }), $(".sparktristate").sparkline("html", {
            type: "tristate"
        }), $(".compositeline").sparkline("html", {
            fillColor: !1,
            changeRangeMin: 0,
            chartRangeMax: 10
        }), $(".compositeline").sparkline([4, 1, 5, 7, 9, 9, 8, 7, 6, 6, 4, 7, 8, 4, 3, 2, 2, 5, 6, 7], {
            composite: !0,
            fillColor: !1,
            lineColor: e,
            changeRangeMin: 0,
            chartRangeMax: 10
        }), $(".normalline").sparkline("html", {
            fillColor: !1,
            normalRangeMin: -1,
            normalRangeMax: 8
        }), $(".discrete1").sparkline("html", {
            type: "discrete",
            xwidth: 18
        }), $(".discrete2").sparkline("html", {
            type: "discrete",
            thresholdValue: 4
        }), $(".sparkbullet").sparkline("html", {
            type: "bullet"
        }), $(".sparkpie").sparkline("html", {
            type: "pie",
            height: "1.0em"
        }), $(".sparkboxplot").sparkline("html", {
            type: "box"
        })
    }, App
}(), App = function() {
    "use strict";
    return App.charts = function() {
        function t() {
            return Math.floor(31 * Math.random()) + 10
        }

        function e(t, e) {
            $("#" + t).bind("plothover", function(t, a, i) {
                var r = $(".tooltip-chart").width();
                i ? $(".tooltip-chart").css({
                    top: i.pageY - e,
                    left: i.pageX - r / 2
                }).fadeIn(200) : $(".tooltip-chart").hide()
            })
        }
        var a, i, r, o, n, l, s, c, d, p, h, u, g, f, m, b;
        a = App.color.primary, $.plot($("#line-chart3"), [{
            data: [
                [0, 12],
                [1, 12.5],
                [2, 15],
                [3, 20],
                [4, 30],
                [5, 60]
            ],
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 2,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .25
                        }, {
                            opacity: .25
                        }]
                    }
                },
                points: {
                    show: !0,
                    radius: 5,
                    lineWidth: 3
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: 23,
                    right: 30,
                    top: 20,
                    botttom: 40
                },
                labelMargin: 15,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.05)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [a],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                ticks: 3,
                max: 60,
                tickSize: 20,
                tickDecimals: 0
            }
        }), e("line-chart3", 70), i = App.color.primary, $.plot($("#bar-chart2"), [{
            data: [
                [0, 7],
                [1, 30],
                [2, 17],
                [3, 20],
                [4, 26],
                [5, 37],
                [6, 35],
                [7, 28],
                [8, 38],
                [9, 38],
                [10, 32]
            ],
            label: "Page Views"
        }], {
            series: {
                bars: {
                    order: 2,
                    align: "center",
                    show: !0,
                    lineWidth: 1,
                    barWidth: .6,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                shadowSize: 2
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: 23,
                    right: 30,
                    top: 20,
                    botttom: 40
                },
                labelMargin: 10,
                axisMargin: 200,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.05)",
                borderWidth: 1,
                borderColor: "rgba(0,0,0,0.0)"
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [i],
            xaxis: {
                ticks: 11,
                tickSize: 1,
                tickDecimals: 0,
                tickColor: "rgba(0,0,0,0.0)"
            },
            yaxis: {
                ticks: 4,
                tickDecimals: 0
            }
        }), e("bar-chart2", 60), r = App.color.primary, $.plot($("#line-chart1"), [{
            data: [
                [0, 20],
                [1, 30],
                [2, 25],
                [3, 39],
                [4, 35],
                [5, 40],
                [6, 30],
                [7, 45]
            ],
            label: "Page Views"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .35
                        }, {
                            opacity: .35
                        }]
                    }
                },
                points: {
                    show: !1
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                margin: {
                    left: -8,
                    right: -8,
                    top: 0,
                    bottom: 0
                },
                show: !1,
                labelMargin: 15,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.15)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [r],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 4,
                tickDecimals: 0
            }
        }), e("line-chart1", 45), o = tinycolor(App.color.primary).brighten(9).toString(), n = tinycolor(App.color.primary).lighten(15).toString(), l = tinycolor(App.color.primary).lighten(20).toString(), s = tinycolor(App.color.primary).lighten(27).toString(), $.plot("#pie-chart4", [{
            label: "Linux",
            data: 45
        }, {
            label: "Windows",
            data: 25
        }, {
            label: "Mac OS",
            data: 20
        }, {
            label: "Android",
            data: 10
        }], {
            series: {
                pie: {
                    show: !0,
                    innerRadius: .35,
                    shadow: {
                        top: 5,
                        left: 15,
                        alpha: .3
                    },
                    stroke: {
                        width: 0
                    },
                    label: {
                        show: !0,
                        formatter: function(t, e) {
                            return '<div style="font-size:12px;text-align:center;padding:2px;color:#333;">' + t + "</div>"
                        }
                    },
                    highlight: {
                        opacity: .08
                    }
                }
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart arrow-none'> <div class='label'> <div class='label-x'> %x.0% </div> </div></div>",
                defaultTheme: !1
            },
            grid: {
                hoverable: !0,
                clickable: !0
            },
            colors: [o, n, l, s],
            legend: {
                show: !1
            }
        }), c = tinycolor(App.color.primary).lighten(25).toString(), d = tinycolor(App.color.primary).brighten(3).toString(), $.plot($("#bar-chart1"), [{
            data: [
                [0, 20],
                [1, 30],
                [2, 19],
                [3, 28],
                [4, 30],
                [5, 37],
                [6, 35],
                [7, 38],
                [8, 48]
            ],
            label: "Page Views"
        }, {
            data: [
                [0, 10],
                [1, 20],
                [2, 15],
                [3, 23],
                [4, 24],
                [5, 29],
                [6, 25],
                [7, 33],
                [8, 35]
            ],
            label: "Unique Visitor"
        }], {
            series: {
                bars: {
                    align: "center",
                    show: !0,
                    lineWidth: 1,
                    barWidth: .6,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                shadowSize: 2
            },
            legend: {
                show: !1
            },
            grid: {
                margin: 0,
                show: !1,
                labelMargin: 10,
                axisMargin: 500,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0.15)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [c, d],
            xaxis: {
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 4,
                tickDecimals: 0
            }
        }), e("bar-chart1", 60), p = tinycolor(App.color.primary).lighten(7).toString(), h = App.color.primary, $.plot("#linechart-mini1", [{
            data: [
                [1, 10],
                [2, 60],
                [3, 40],
                [4, 50],
                [5, 30]
            ],
            canvasRender: !0
        }, {
            data: [
                [1, 30],
                [2, 40],
                [3, 25],
                [4, 40],
                [5, 65]
            ],
            canvasRender: !0
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 0,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .7
                        }, {
                            opacity: .7
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                shadowSize: 0,
                curvedLines: {
                    apply: !0,
                    active: !0,
                    monotonicFit: !0
                }
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                hoverable: !0,
                clickable: !0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [p, h],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("linechart-mini1", 45),
            function() {
                var t = App.color.primary,
                    a = [],
                    i = 100;

                function r() {
                    for (a.length > 0 && (a = a.slice(1)); a.length < i;) {
                        var t = (a.length > 0 ? a[a.length - 1] : 50) + 10 * Math.random() - 5;
                        t < 0 ? t = 0 : t > 100 && (t = 100), a.push(t)
                    }
                    for (var e = [], r = 0; r < a.length; ++r) e.push([r, a[r]]);
                    return e
                }
                var o = 500,
                    n = $.plot("#live-data", [r()], {
                        series: {
                            shadowSize: 0,
                            lines: {
                                show: !0,
                                lineWidth: 1,
                                fill: !0,
                                fillColor: {
                                    colors: [{
                                        opacity: .2
                                    }, {
                                        opacity: .2
                                    }]
                                }
                            }
                        },
                        grid: {
                            show: !0,
                            margin: {
                                top: 3,
                                bottom: 0,
                                left: 0,
                                right: 0
                            },
                            labelMargin: 0,
                            axisMargin: 0,
                            hoverable: !0,
                            clickable: !0,
                            tickColor: "rgba(0,0,0,0)",
                            borderWidth: 0,
                            minBorderMargin: 0
                        },
                        tooltip: {
                            show: !0,
                            cssClass: "tooltip-chart",
                            content: "<div class='content-chart'> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                            defaultTheme: !1
                        },
                        colors: [t],
                        yaxis: {
                            show: !1,
                            autoscaleMargin: .2,
                            ticks: 5,
                            tickDecimals: 0
                        },
                        xaxis: {
                            show: !1,
                            autoscaleMargin: 0
                        }
                    });
                e("live-data", 45),
                    function t() {
                        n.setData([r()]), n.draw(), setTimeout(t, o)
                    }()
            }(), u = tinycolor(App.color.primary).lighten(22), g = App.color.primary, f = [
            [1, t()],
            [2, t()],
            [3, 2 + t()],
            [4, 3 + t()],
            [5, 5 + t()],
            [6, 10 + t()],
            [7, 15 + t()],
            [8, 20 + t()],
            [9, 25 + t()],
            [10, 30 + t()],
            [11, 35 + t()],
            [12, 25 + t()],
            [13, 15 + t()],
            [14, 20 + t()],
            [15, 45 + t()],
            [16, 50 + t()],
            [17, 65 + t()],
            [18, 70 + t()],
            [19, 85 + t()],
            [20, 80 + t()],
            [21, 75 + t()],
            [22, 80 + t()],
            [23, 75 + t()]
        ], m = [
            [1, t()],
            [2, t()],
            [3, 10 + t()],
            [4, 15 + t()],
            [5, 20 + t()],
            [6, 25 + t()],
            [7, 30 + t()],
            [8, 35 + t()],
            [9, 40 + t()],
            [10, 45 + t()],
            [11, 50 + t()],
            [12, 55 + t()],
            [13, 60 + t()],
            [14, 70 + t()],
            [15, 75 + t()],
            [16, 80 + t()],
            [17, 85 + t()],
            [18, 90 + t()],
            [19, 95 + t()],
            [20, 100 + t()],
            [21, 110 + t()],
            [22, 120 + t()],
            [23, 130 + t()]
        ], $.plot($("#line-chart-live"), [{
            data: m,
            showLabels: !0,
            label: "New Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: f,
            showLabels: !0,
            label: "Old Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 1.5,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .5
                        }, {
                            opacity: .5
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !1,
                    fill: !0
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                margin: {
                    top: -20,
                    bottom: 0,
                    left: 0,
                    right: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0)",
                borderWidth: 0,
                minBorderMargin: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [u, g],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .2,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("line-chart-live", 60), b = App.color.primary, $("#line-chart2"), $.plot("#line-chart2", [{
            data: [
                [1, 40],
                [2, 30],
                [3, 55],
                [4, 36],
                [5, 57],
                [6, 50],
                [7, 65],
                [8, 50],
                [9, 80],
                [10, 70]
            ],
            showLabels: !0,
            label: "New Visitors",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: 2,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: .35
                        }, {
                            opacity: .35
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !0,
                    fill: !0,
                    radius: 4,
                    fillColor: b
                },
                shadowSize: 0
            },
            legend: {
                show: !1
            },
            grid: {
                show: !1,
                margin: {
                    left: -8,
                    right: -8,
                    top: 0,
                    botttom: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0, 0, 0, 0)",
                borderWidth: 0
            },
            tooltip: {
                show: !0,
                cssClass: "tooltip-chart",
                content: "<div class='content-chart'> <span> %s </span> <div class='label'> <div class='label-x'> %x.0 </div> - <div class='label-y'> %y.0 </div> </div></div>",
                defaultTheme: !1
            },
            colors: [b],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .5,
                ticks: 5,
                tickDecimals: 0
            }
        }), e("line-chart2", 60)
    }, App
}(), App = function() {
    "use strict";
    return App.formElements = function() {
        $(".inputfile").each(function() {
            var t = $(this),
                e = t.next("label"),
                a = e.html();
            t.on("change", function(t) {
                var i = "";
                this.files && this.files.length > 1 ? i = (this.getAttribute("data-multiple-caption") || "").replace("{count}", this.files.length) : t.target.value && (i = t.target.value.split("\\").pop()), i ? e.find("span").html(i) : e.html(a)
            })
        }), $(".select2").select2({
            width: "100%"
        }), $(".tags").select2({
            tags: !0,
            width: "100%"
        }), $(".bslider").bootstrapSlider(), $("#datepicker1").datepicker({
            autoclose: !0
        }), $("#datepicker2").datepicker({
            autoclose: !0,
            todayHighlight: !0
        }), $("#datepicker3").datepicker({
            startView: 1,
            autoclose: !0
        }), $("#datepicker4").datepicker({
            startView: 2,
            autoclose: !0
        }), $("#datepicker5").datepicker({
            startView: 3,
            autoclose: !0
        }), $("#datepicker6").datepicker({
            startView: 4,
            autoclose: !0
        }), $("#datepicker7").datepicker({
            todayBtn: "linked",
            autoclose: !0
        })
    }, App
}(), App = function() {
    "use strict";
    return App.masks = function() {
        $("[data-mask='date']").mask("99/99/9999"), $("[data-mask='phone']").mask("(999) 999-9999"), $("[data-mask='phone-ext']").mask("(999) 999-9999? x99999"), $("[data-mask='phone-int']").mask("+33 999 999 999"), $("[data-mask='taxid']").mask("99-9999999"), $("[data-mask='ssn']").mask("999-99-9999"), $("[data-mask='product-key']").mask("a*-999-a999"), $("[data-mask='percent']").mask("99%"), $("[data-mask='currency']").mask("$999,999,999.99")
    }, App
}(), App = function() {
    "use strict";
    return App.formMultiselect = function() {
        $("#my-select").multiSelect(), $("#pre-selected-options").multiSelect(), $("#callbacks").multiSelect({
            afterSelect: function(t) {
                alert("Select value: " + t)
            },
            afterDeselect: function(t) {
                alert("Deselect value: " + t)
            }
        }), $("#optgroup").multiSelect({
            selectableOptgroup: !0
        }), $("#disabled-attribute").multiSelect(), $("#custom-headers").multiSelect({
            selectableHeader: "<div class='custom-header'>Selectable items</div>",
            selectionHeader: "<div class='custom-header'>Selection items</div>"
        }), $("#searchable").multiSelect({
            selectableHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
            selectionHeader: "<input type='text' class='form-control search-input' autocomplete='off' placeholder='Search'>",
            afterInit: function(t) {
                var e = this,
                    a = e.$selectableUl.prev(),
                    i = e.$selectionUl.prev(),
                    r = "#" + e.$container.attr("id") + " .ms-elem-selectable:not(.ms-selected)",
                    o = "#" + e.$container.attr("id") + " .ms-elem-selection.ms-selected";
                e.qs1 = a.quicksearch(r).on("keydown", function(t) {
                    if (40 === t.which) return e.$selectableUl.focus(), !1
                }), e.qs2 = i.quicksearch(o).on("keydown", function(t) {
                    if (40 == t.which) return e.$selectionUl.focus(), !1
                })
            },
            afterSelect: function() {
                this.qs1.cache(), this.qs2.cache()
            },
            afterDeselect: function() {
                this.qs1.cache(), this.qs2.cache()
            }
        })
    }, App
}(), App = function() {
    "use strict";
    return App.wizard = function() {
        $(".wizard-ux").wizard(), $(".wizard-ux").on("changed.fu.wizard", function() {
            $(".bslider").slider()
        }), $(".wizard-next").click(function(t) {
            var e = $(this).data("wizard");
            $(e).wizard("next"), t.preventDefault()
        }), $(".wizard-previous").click(function(t) {
            var e = $(this).data("wizard");
            $(e).wizard("previous"), t.preventDefault()
        }), $(".select2").select2({
            width: "100%"
        }), $(".tags").select2({
            tags: !0,
            width: "100%"
        }), $("#credit_slider").slider().on("slide", function(t) {
            $("#credits").html("$" + t.value)
        }), $("#rate_slider").slider().on("slide", function(t) {
            $("#rate").html(t.value + "%")
        })
    }, App
}(), App = function() {
    "use strict";
    return App.emailCompose = function() {
        $(".tags").select2({
            tags: 0,
            width: "100%"
        })
    }, App
}(), App = function() {
    "use strict";
    return App.mailInbox = function() {
        $(".mai-select-all input").on("change", function() {
            var t = $(".email-list").find('input[type="checkbox"]');
            $(this).is(":checked") ? t.prop("checked", !0) : t.prop("checked", !1)
        })
    }, App
}(), App = function() {
    "use strict";
    return App.mapsGoogle = function() {
        var t = {
            zoom: 14,
            center: new google.maps.LatLng(-33.877827, 151.188598),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        new google.maps.Map(document.getElementById("map_one"), t);
        t = {
            zoom: 14,
            center: new google.maps.LatLng(-33.877827, 151.188598),
            mapTypeId: google.maps.MapTypeId.HYBRID
        };
        new google.maps.Map(document.getElementById("map_two"), t);
        t = {
            zoom: 14,
            center: new google.maps.LatLng(-33.877827, 151.188598),
            mapTypeId: google.maps.MapTypeId.TERRAIN
        };
        new google.maps.Map(document.getElementById("map_three"), t)
    }, App
}(), (App = function() {
    "use strict";
    return App.mapsVector = function() {
        var t = App.color.primary,
            e = App.color.dark,
            a = App.color.danger,
            i = App.color.warning,
            r = App.color.info,
            o = App.color.dark,
            n = App.color.warning,
            l = App.color.danger;
        $("#usa-map").vectorMap({
            map: "us_merc_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: t
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#france-map").vectorMap({
            map: "fr_merc_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: e
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#uk-map").vectorMap({
            map: "uk_mill_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: a
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#chicago-map").vectorMap({
            map: "us-il-chicago_mill_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: i
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#australia-map").vectorMap({
            map: "au_mill_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: r
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#india-map").vectorMap({
            map: "in_mill_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: o
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        }), $("#vector-map").vectorMap({
            map: "map",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: n,
                    "fill-opacity": .8,
                    stroke: "none",
                    "stroke-width": 0,
                    "stroke-opacity": 1
                },
                hover: {
                    "fill-opacity": .8
                }
            },
            markerStyle: {
                initial: {
                    r: 10
                }
            },
            markers: [{
                coords: [100, 100],
                name: "Marker 1",
                style: {
                    fill: "#acb1b6",
                    stroke: "#cfd5db",
                    "stroke-width": 3
                }
            }, {
                coords: [200, 200],
                name: "Marker 2",
                style: {
                    fill: "#acb1b6",
                    stroke: "#cfd5db",
                    "stroke-width": 3
                }
            }]
        }), $("#canada-map").vectorMap({
            map: "ca_lcc_en",
            backgroundColor: "transparent",
            regionStyle: {
                initial: {
                    fill: l
                },
                hover: {
                    "fill-opacity": .8
                }
            }
        })
    }, App
}()).moduleName = function() {
    "use strict"
}, App = App, App = function() {
    "use strict";
    return App.pageGallery = function() {
        var t = $(".gallery-container");
        t.masonry({
            columnWidth: 0,
            itemSelector: ".item"
        }), $("#sidebar-collapse").click(function() {
            t.masonry()
        }), $(".image-zoom").magnificPopup({
            type: "image",
            mainClass: "mfp-with-zoom",
            zoom: {
                enabled: !0,
                duration: 300,
                easing: "ease-in-out",
                opener: function(t) {
                    return $(t).parents("div.img")
                }
            }
        }), t.masonry()
    }, App
}(), App = function() {
    "use strict";
    return App.profile = function() {
        var t, e, a, i;
        t = App.color.primary, e = tinycolor(App.color.primary).brighten(5).saturate(15), a = tinycolor(App.color.primary).brighten(15).saturate(15), $.plot($("#develop-chart"), [{
            data: [
                [1, 30],
                [2, 10],
                [3, 10],
                [4, 15],
                [5, 0],
                [6, 47],
                [7, 65],
                [8, 10]
            ],
            showLabels: !0,
            label: "Purchases",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 20],
                [2, 25],
                [3, 30],
                [4, 35],
                [5, 55],
                [6, 42],
                [7, 15],
                [8, 25]
            ],
            showLabels: !0,
            label: "Plans",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }, {
            data: [
                [1, 10],
                [2, 30],
                [3, 25],
                [4, 30],
                [5, 35],
                [6, 15],
                [7, 10],
                [8, 15]
            ],
            showLabels: !0,
            label: "Services",
            labelPlacement: "below",
            canvasRender: !0,
            cColor: "#FFFFFF"
        }], {
            series: {
                lines: {
                    show: !0,
                    lineWidth: .5,
                    fill: !0,
                    fillColor: {
                        colors: [{
                            opacity: 1
                        }, {
                            opacity: 1
                        }]
                    }
                },
                fillColor: "rgba(0, 0, 0, 1)",
                points: {
                    show: !1,
                    fill: !0
                },
                shadowSize: 0
            },
            legend: {
                show: !0,
                position: "nw",
                noColumns: 0,
                background: "green",
                container: $("#develop-chart-legend")
            },
            grid: {
                show: !1,
                margin: {
                    top: -20,
                    bottom: 0,
                    left: 0,
                    right: 0
                },
                labelMargin: 0,
                axisMargin: 0,
                hoverable: !0,
                clickable: !0,
                tickColor: "rgba(0,0,0,0)",
                borderWidth: 0,
                minBorderMargin: 0
            },
            colors: [t, e, a],
            xaxis: {
                autoscaleMargin: 0,
                ticks: 11,
                tickDecimals: 0
            },
            yaxis: {
                autoscaleMargin: .2,
                ticks: 5,
                tickDecimals: 0
            }
        }), i = (new Date).getTime() + 10006e4, $("#user-countdown").countdown(i, function(t) {
            $(this).text(t.strftime("%H %M %S")), $(this).html(t.strftime('<div class="time-component"><span class="time-counter">%H</span><span class="time-component-title"> Hours </span></div><div class="time-component"><span class="time-counter">%M</span><span class="time-component-title"> Minutes </span></div><div class="time-component"><span class="time-counter">%S</span><span class="time-component-title"> Seconds </span> </div>'))
        }), $('[data-toggle="counter"]').each(function(t, e) {
            var a = $(this),
                i = "",
                r = "",
                o = 0,
                n = 0,
                l = 0,
                s = 2.5;
            a.data("prefix") && (i = a.data("prefix")), a.data("suffix") && (r = a.data("suffix")), a.data("start") && (o = a.data("start")), a.data("end") && (n = a.data("end")), a.data("decimals") && (l = a.data("decimals")), a.data("duration") && (s = a.data("duration")), new CountUp(a.get(0), o, n, l, s, {
                suffix: r,
                prefix: i
            }).start()
        }),
            function() {
                var t = $(".widget-calendar"),
                    e = $(".cal-notes", t),
                    a = $(".day", e),
                    i = $(".date", e),
                    r = new Date,
                    o = new Array(7);
                o[0] = "Sunday", o[1] = "Monday", o[2] = "Tuesday", o[3] = "Wednesday", o[4] = "Thursday", o[5] = "Friday", o[6] = "Saturday";
                var n = o[r.getDay()];
                a.html(n);
                var l = new Array;
                l[0] = "January", l[1] = "February", l[2] = "March", l[3] = "April", l[4] = "May", l[5] = "June", l[6] = "July", l[7] = "August", l[8] = "September", l[9] = "October", l[10] = "November", l[11] = "December";
                var s = l[r.getMonth()],
                    c = r.getDate();
                i.html(s + " " + c), void 0 !== jQuery.ui && $(".ui-datepicker").datepicker({
                    onSelect: function(t, e) {
                        var r = new Date(t),
                            n = o[r.getDay()],
                            s = l[r.getMonth()],
                            c = r.getDate();
                        a.html(n), i.html(s + " " + c)
                    }
                })
            }()
    }, App
}(), App = function() {
    "use strict";
    return App.tableFilters = function() {
        $(".select2").select2({
            width: "100%"
        }), $(".tags").select2({
            tags: !0,
            width: "100%"
        }), $(".bslider").bootstrapSlider(), $("#milestone_slider").slider().on("slide", function(t) {
            var e = t.value[0],
                a = t.value[1];
            $("#slider-value").html(e + "% - " + a + "%")
        }), $(".datepicker").datepicker({
            autoclose: !0
        })
    }, App
}(), App = function() {
    "use strict";
    return App.dataTables = function() {
        $.extend(!0, $.fn.dataTable.defaults, {
            dom: "<'row mai-datatable-header'<'col-sm-6'l><'col-sm-6'f>><'row mai-datatable-body'<'col-sm-12'tr>><'row mai-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
        }), $.extend($.fn.dataTable.ext.classes, {
            sFilterInput: "form-control form-control-sm",
            sLengthSelect: "form-control form-control-sm"
        }), $("#table1").dataTable(), $("#table2").dataTable({
            pageLength: 6,
            dom: "<'row mai-datatable-body'<'col-sm-12'tr>><'row mai-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
        }), $("#table3").dataTable({
            buttons: [{
                extend: "copy",
                className: "btn-secondary"
            }, {
                extend: "excel",
                className: "btn-secondary"
            }, {
                extend: "pdf",
                className: "btn-secondary"
            }, {
                extend: "print",
                className: "btn-secondary"
            }],
            lengthMenu: [
                [6, 10, 25, 50, -1],
                [6, 10, 25, 50, "All"]
            ],
            dom: "<'row mai-datatable-header'<'col-sm-6'l><'col-sm-6 text-right'B>><'row mai-datatable-body'<'col-sm-12'tr>><'row mai-datatable-footer'<'col-sm-5'i><'col-sm-7'p>>"
        })
    }, App
}(), App = function() {
    "use strict";
    return App.uiGeneral = function() {
        $('.panel-body [data-toggle="dropdown"]').on("click", function(t) {
            t.stopPropagation()
        })
    }, App
}(), App = function() {
    "use strict";
    return App.uiNestableLists = function() {
        function t(t, e) {
            var a = $(t).nestable("serialize");
            $(e).html(window.JSON.stringify(a))
        }
        $(".dd").nestable(), t("#list1", "#out1"), t("#list2", "#out2"), $("#list1").on("change", function() {
            t("#list1", "#out1")
        }), $("#list2").on("change", function() {
            t("#list2", "#out2")
        })
    }, App
}(), App = function() {
    "use strict";
    return App.uiNotifications = function() {
        $("#not-basic").click(function() {
            return $.gritter.add({
                title: "MiguelMich new msg!",
                text: "You have a new Thomas message, let's checkout your inbox.",
                image: App.conf.assetsPath + "/" + App.conf.imgPath + "/avatar.jpg",
                time: "",
                class_name: "gritter-basic"
            }), !1
        }), $("#not-theme").click(function() {
            return $.gritter.add({
                title: "Welcome home!",
                text: "You can start your day checking the new messages.",
                image: App.conf.assetsPath + "/" + App.conf.imgPath + "/avatar.jpg",
                class_name: "gritter-theme",
                time: ""
            }), !1
        }), $("#not-sticky").click(function() {
            return $.gritter.add({
                title: "Sticky Note",
                text: "Your daily goal is 130 new code lines, don't forget to update your work.",
                image: App.conf.assetsPath + "/" + App.conf.imgPath + "/slack_logo.png",
                class_name: "gritter-sticky",
                sticky: !0,
                time: ""
            }), !1
        }), $("#not-text").click(function() {
            return $.gritter.add({
                title: "Just Text",
                text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum.",
                class_name: "gritter-clean",
                time: ""
            }), !1
        }), $("#not-tr").click(function() {
            return $.extend($.gritter.options, {
                position: "top-right"
            }), $.gritter.add({
                title: "Top Right",
                text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                class_name: "gritter-clean"
            }), !1
        }), $("#not-tl").click(function() {
            return $.extend($.gritter.options, {
                position: "top-left"
            }), $.gritter.add({
                title: "Top Left",
                text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                class_name: "gritter-clean"
            }), !1
        }), $("#not-bl").click(function() {
            return $.extend($.gritter.options, {
                position: "bottom-left"
            }), $.gritter.add({
                title: "Bottom Left",
                text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                class_name: "gritter-clean"
            }), !1
        }), $("#not-br").click(function() {
            return $.extend($.gritter.options, {
                position: "bottom-right"
            }), $.gritter.add({
                title: "Bottom Right",
                text: "This is a simple Gritter Notification. Etiam efficitur efficitur nisl eu dictum, nullam non orci elementum",
                class_name: "gritter-clean"
            }), !1
        }), $("#not-facebook").click(function() {
            return $.gritter.add({
                title: "You have comments!",
                text: "You can start your day checking the new messages.",
                icon: !0,
                class_name: "gritter-social facebook"
            }), !1
        }), $("#not-twitter").click(function() {
            return $.gritter.add({
                title: "You have new followers!",
                text: "You can start your day checking the new messages.",
                icon: !0,
                class_name: "gritter-social twitter"
            }), !1
        }), $("#not-google-plus").click(function() {
            return $.gritter.add({
                title: "You have new +1!",
                text: "You can start your day checking the new messages.",
                icon: !0,
                class_name: "gritter-social google-plus"
            }), !1
        }), $("#not-dribbble").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social dribbble"
            }), !1
        }), $("#not-flickr").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social flickr"
            }), !1
        }), $("#not-linkedin").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social linkedin"
            }), !1
        }), $("#not-youtube").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social youtube"
            }), !1
        }), $("#not-pinterest").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social pinterest"
            }), !1
        }), $("#not-github").click(function() {
            return $.gritter.add({
                title: "You have new forks!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social github"
            }), !1
        }), $("#not-tumblr").click(function() {
            return $.gritter.add({
                title: "You have new comments!",
                text: "You can start your day checking the new comments.",
                icon: !0,
                class_name: "gritter-social tumblr"
            }), !1
        }), $("#not-primary").click(function() {
            $.gritter.add({
                title: "Primary",
                text: "This is a simple Gritter Notification.",
                class_name: "gritter-color primary"
            })
        }), $("#not-info").click(function() {
            $.gritter.add({
                title: "Info",
                text: "This is a simple Gritter Notification.",
                class_name: "gritter-color info"
            })
        }), $("#not-warning").click(function() {
            $.gritter.add({
                title: "Warning",
                text: "This is a simple Gritter Notification.",
                class_name: "gritter-color warning"
            })
        }), $("#not-danger").click(function() {
            $.gritter.add({
                title: "Danger",
                text: "This is a simple Gritter Notification.",
                class_name: "gritter-color danger"
            })
        }), $("#not-dark").click(function() {
            $.gritter.add({
                title: "Dark Color",
                text: "This is a simple Gritter Notification.",
                class_name: "gritter-color dark"
            })
        })
    }, App
}();