! function(o, r, t) {
    var s = "astHookExtSticky",
        i = r.document,
        a = (jQuery(r).outerWidth(), jQuery(r).width()),
        n = {
            dependent: [],
            max_width: "",
            site_layout: "",
            break_point: 920,
            admin_bar_height_lg: 32,
            admin_bar_height_sm: 46,
            admin_bar_height_xs: 0,
            stick_upto_scroll: 0,
            gutter: 0,
            wrap: "<div></div>",
            body_padding_support: !0,
            html_padding_support: !0,
            active_shrink: !1,
            shrink: {
                padding_top: "",
                padding_bottom: ""
            },
            sticky_on_device: "desktop",
            header_style: "none",
            hide_on_scroll: "no"
        };

    function e(t, e) {
        this.element = t, this.options = o.extend({}, n, e), this._defaults = n, this._name = s, "1" == this.options.hide_on_scroll && (this.navbarHeight = o(t).outerHeight()), this.lastScrollTop = 0, this.delta = 5, this.should_stick = !0, this.hideScrollInterval = "", this.init()
    }
    e.prototype.stick_me = function(t, e) {
        var o = jQuery(t.element),
            s = jQuery(r).outerWidth(),
            i = parseInt(t.options.stick_upto_scroll),
            a = parseInt(o.parent().attr("data-stick-maxwidth")),
            n = parseInt(o.parent().attr("data-stick-gutter"));
        "enabled" == (astraAddon.hook_sticky_header || "") && ("desktop" == t.options.sticky_on_device && astraAddon.hook_custom_header_break_point > s ? t.stickRelease(t) : "mobile" == t.options.sticky_on_device && astraAddon.hook_custom_header_break_point <= s ? t.stickRelease(t) : jQuery(r).scrollTop() > i ? "none" == t.options.header_style && ("enabled" == t.options.active_shrink && t.hasShrink(t, "stick"), o.hasClass("ast-custom-header") && (o.parent().css("min-height", o.outerHeight()), o.addClass("ast-header-sticky-active").stop().css({
            "max-width": a,
            top: n,
            "padding-top": t.options.shrink.padding_top,
            "padding-bottom": t.options.shrink.padding_bottom
        }), o.addClass("ast-sticky-shrunk").stop())) : t.stickRelease(t)), "enabled" == (astraAddon.hook_sticky_footer || "") && ("desktop" == t.options.sticky_on_device && astraAddon.hook_custom_footer_break_point > s ? t.stickRelease(t) : "mobile" == t.options.sticky_on_device && astraAddon.hook_custom_footer_break_point <= s ? t.stickRelease(t) : (jQuery("body").addClass("ast-footer-sticky-active"), o.parent().css("min-height", o.outerHeight()), o.stop().css({
            "max-width": a
        })))
    }, e.prototype.update_attrs = function() {
        var t = this,
            e = jQuery(t.element),
            o = parseInt(t.options.gutter),
            s = t.options.max_width;
        if ("none" == t.options.header_style) var i = e.offset().top || 0;
        "ast-box-layout" != t.options.site_layout && (s = jQuery("body").width()), t.options.dependent && jQuery.each(t.options.dependent, function(t, e) {
            jQuery(e).length && "on" == jQuery(e).parent().attr("data-stick-support") && (dependent_height = jQuery(e).outerHeight(), o += parseInt(dependent_height), i -= parseInt(dependent_height))
        }), t.options.admin_bar_height_lg && jQuery("#wpadminbar").length && 782 < a && (o += parseInt(t.options.admin_bar_height_lg), i -= parseInt(t.options.admin_bar_height_lg)), t.options.admin_bar_height_sm && jQuery("#wpadminbar").length && 600 <= a && a <= 782 && (o += parseInt(t.options.admin_bar_height_sm), i -= parseInt(t.options.admin_bar_height_sm)), t.options.admin_bar_height_xs && jQuery("#wpadminbar").length && (o += parseInt(t.options.admin_bar_height_xs), i -= parseInt(t.options.admin_bar_height_xs)), t.options.body_padding_support && (o += parseInt(jQuery("body").css("padding-top"), 10), i -= parseInt(jQuery("body").css("padding-top"), 10)), t.options.html_padding_support && (o += parseInt(jQuery("html").css("padding-top"), 10), i -= parseInt(jQuery("html").css("padding-top"), 10)), t.options.stick_upto_scroll = i, "none" == t.options.header_style && e.parent().css("min-height", e.outerHeight()).attr("data-stick-gutter", parseInt(o)).attr("data-stick-maxwidth", parseInt(s))
    }, e.prototype.hasShrink = function(t, e) {
        o(r).scrollTop() > jQuery(t.element).outerHeight() ? jQuery("body").addClass("ast-shrink-custom-header") : jQuery("body").removeClass("ast-shrink-custom-header")
    }, e.prototype.stickRelease = function(t) {
        var e = jQuery(t.element);
        "enabled" == (astraAddon.hook_sticky_header || "") && "none" == t.options.header_style && (e.removeClass("ast-header-sticky-active").stop().css({
            "max-width": "",
            top: "",
            padding: ""
        }), e.parent().css("min-height", ""), e.removeClass("ast-sticky-shrunk").stop()), "enabled" == (astraAddon.hook_sticky_footer || "") && jQuery("body").removeClass("ast-footer-sticky-active")
    }, e.prototype.init = function() {
        if (jQuery(this.element)) {
            var e = this,
                t = jQuery(e.element);
            parseInt(e.options.gutter), t.position().top;
            "none" == e.options.header_style && t.wrap(e.options.wrap).parent().css("min-height", t.outerHeight()).attr("data-stick-support", "on").attr("data-stick-maxwidth", parseInt(e.options.max_width)), e.update_attrs(), jQuery(r).on("resize", function() {
                e.stickRelease(e), e.update_attrs(), e.stick_me(e)
            }), jQuery(r).on("scroll", function() {
                e.stick_me(e, "scroll")
            }), jQuery(i).ready(function(t) {
                e.stick_me(e)
            })
        }
    }, o.fn[s] = function(t) {
        return this.each(function() {
            o.data(this, "plugin_" + s) || o.data(this, "plugin_" + s, new e(this, t))
        })
    };
    var d = jQuery("body").width(),
        _ = astraAddon.site_layout || "",
        h = astraAddon.hook_sticky_header || "",
        p = astraAddon.hook_shrink_header || "";
    switch (sticky_header_on_devices = astraAddon.hook_sticky_header_on_devices || "desktop", site_layout_box_width = astraAddon.site_layout_box_width || 1200, hook_sticky_footer = astraAddon.hook_sticky_footer || "", sticky_footer_on_devices = astraAddon.hook_sticky_footer_on_devices || "desktop", _) {
        case "ast-box-layout":
            d = parseInt(site_layout_box_width)
    }
    jQuery(i).ready(function(t) {
        "enabled" == h && jQuery(".ast-custom-header").astHookExtSticky({
            sticky_on_device: sticky_header_on_devices,
            header_style: "none",
            site_layout: _,
            max_width: d,
            active_shrink: p
        }), "enabled" == hook_sticky_footer && jQuery(".ast-custom-footer").astHookExtSticky({
            sticky_on_device: sticky_footer_on_devices,
            max_width: d,
            site_layout: _,
            header_style: "none"
        })
    })
}(jQuery, window);
! function(r, i, e) {
    var a = "astExtSticky",
        d = i.document,
        o = (jQuery(i).outerWidth(), jQuery(i).width()),
        s = {
            dependent: [],
            max_width: "",
            site_layout: "",
            break_point: 920,
            admin_bar_height_lg: 32,
            admin_bar_height_sm: 46,
            admin_bar_height_xs: 0,
            stick_upto_scroll: 0,
            gutter: 0,
            wrap: "<div></div>",
            body_padding_support: !0,
            html_padding_support: !0,
            shrink: {
                padding_top: "",
                padding_bottom: ""
            },
            sticky_on_device: "desktop",
            header_style: "none",
            hide_on_scroll: "no"
        },
        n = 0;

    function t(e, t) {
        this.element = e, this.options = r.extend({}, s, t), this._defaults = s, this._name = a, "1" == this.options.hide_on_scroll && (this.navbarHeight = r(e).outerHeight()), this.lastScrollTop = 0, this.delta = 5, this.should_stick = !0, this.hideScrollInterval = "", this.init()
    }
    t.prototype.stick_me = function(e, t) {
        var a = jQuery(e.element);
        jQuery(i).outerWidth();
        if (stick_upto_scroll = parseInt(e.options.stick_upto_scroll), max_width = parseInt(a.parent().attr("data-stick-maxwidth")), gutter = parseInt(a.parent().attr("data-stick-gutter")), "desktop" == e.options.sticky_on_device && jQuery("body").hasClass("ast-header-break-point")) e.stickRelease(e);
        else if ("mobile" != e.options.sticky_on_device || jQuery("body").hasClass("ast-header-break-point"))
            if (jQuery(i).scrollTop() > stick_upto_scroll) {
                var s = a;
                "1" === e.options.hide_on_scroll ? e.hasScrolled(e, "stick") : "none" == e.options.header_style ? (a.parent().css("min-height", a.outerHeight()), a.addClass("ast-sticky-active").stop().css({
                    "max-width": max_width,
                    top: gutter,
                    "padding-top": e.options.shrink.padding_top,
                    "padding-bottom": e.options.shrink.padding_bottom
                }), a.addClass("ast-sticky-shrunk").stop(), r(d).trigger("addStickyClass"), s.addClass("ast-header-sticked")) : "slide" == e.options.header_style ? (s.css({
                    top: gutter
                }), s.addClass("ast-header-slide"), s.css("visibility", "visible"), s.addClass("ast-sticky-active").stop().css({
                    transform: "translateY(0)"
                }), r("html").addClass("ast-header-stick-slide-active"), r(d).trigger("addStickyClass"), s.addClass("ast-header-sticked")) : "fade" == e.options.header_style && (s.css({
                    top: gutter
                }), s.addClass("ast-header-fade"), s.css("visibility", "visible"), s.addClass("ast-sticky-active").stop().css({
                    opacity: "1"
                }), r("html").addClass("ast-header-stick-fade-active"), r(d).trigger("addStickyClass"), s.addClass("ast-header-sticked"))
            } else e.stickRelease(e);
        else e.stickRelease(e)
    }, t.prototype.update_attrs = function() {
        var e = this,
            t = jQuery(e.element),
            a = parseInt(e.options.gutter),
            s = e.options.max_width;
        if ("none" != e.options.header_style || jQuery("body").hasClass("ast-sticky-toggled-off")) {
            if (r("#masthead").length) {
                var i = r("#masthead");
                d = i.offset().top + i.outerHeight() + 100 || 0
            }
        } else var d = t.offset().top || 0;
        "ast-box-layout" != e.options.site_layout && (s = jQuery("body").width()), e.options.dependent && jQuery.each(e.options.dependent, function(e, t) {
            jQuery(t).length && "on" == jQuery(t).parent().attr("data-stick-support") && (dependent_height = jQuery(t).outerHeight(), a += parseInt(dependent_height), d -= parseInt(dependent_height))
        }), e.options.admin_bar_height_lg && jQuery("#wpadminbar").length && 782 < o && (a += parseInt(e.options.admin_bar_height_lg), d -= parseInt(e.options.admin_bar_height_lg)), e.options.admin_bar_height_sm && jQuery("#wpadminbar").length && 600 <= o && o <= 782 && (a += parseInt(e.options.admin_bar_height_sm), d -= parseInt(e.options.admin_bar_height_sm)), e.options.admin_bar_height_xs && jQuery("#wpadminbar").length && (a += parseInt(e.options.admin_bar_height_xs), d -= parseInt(e.options.admin_bar_height_xs)), e.options.body_padding_support && (a += parseInt(jQuery("body").css("padding-top"), 10), d -= parseInt(jQuery("body").css("padding-top"), 10)), e.options.html_padding_support && (a += parseInt(jQuery("html").css("padding-top"), 10), d -= parseInt(jQuery("html").css("padding-top"), 10)), e.options.stick_upto_scroll = d, "none" == e.options.header_style ? t.parent().css("min-height", t.outerHeight()).attr("data-stick-gutter", parseInt(a)).attr("data-stick-maxwidth", parseInt(s)) : (t.parent().attr("data-stick-gutter", parseInt(a)).attr("data-stick-maxwidth", parseInt(s)), "ast-padded-layout" === e.options.site_layout && t.css("max-width", parseInt(s)))
    }, t.prototype.hasScrolled = function(e, t) {
        var a = r(i).scrollTop();
        if (!(Math.abs(n - a) <= 5)) {
            var s = jQuery(e.element);
            n < a && 0 < a ? jQuery(e.element).removeClass("ast-nav-down").addClass("ast-nav-up") : a + r(i).height() < r(d).height() && jQuery(e.element).removeClass("ast-nav-up").addClass("ast-nav-down"), n = a, r(e.element).hasClass("ast-nav-up") || "stick" != t ? (s.css({
                transform: "translateY(-100%)"
            }).stop(), setTimeout(function() {
                s.removeClass("ast-sticky-active")
            }, 300), s.css({
                visibility: "hidden",
                top: ""
            }), r(d).trigger("removeStickyClass"), r("html").removeClass("ast-header-stick-scroll-active"), s.removeClass("ast-header-sticked")) : (s.css({
                top: gutter
            }), s.addClass("ast-header-sticked"), s.addClass("ast-header-slide"), s.css("visibility", "visible"), s.addClass("ast-sticky-active").stop().css({
                transform: "translateY(0)"
            }), r(d).trigger("addStickyClass"), r("html").addClass("ast-header-stick-scroll-active"))
        }
    }, t.prototype.stickRelease = function(e) {
        var t = jQuery(e.element),
            a = t;
        "1" === e.options.hide_on_scroll ? e.hasScrolled(e, "release") : "none" == e.options.header_style ? (t.removeClass("ast-sticky-active").stop().css({
            "max-width": "",
            top: "",
            padding: ""
        }), t.parent().css("min-height", ""), r(d).trigger("removeStickyClass"), a.removeClass("ast-header-sticked"), t.removeClass("ast-sticky-shrunk").stop()) : "slide" == e.options.header_style ? (a.removeClass("ast-sticky-active").stop().css({
            transform: "translateY(-100%)"
        }), a.css({
            visibility: "hidden",
            top: ""
        }), r("html").removeClass("ast-header-stick-slide-active"), r(d).trigger("removeStickyClass"), a.removeClass("ast-header-sticked")) : "fade" == e.options.header_style && (a.removeClass("ast-sticky-active").stop().css({
            opacity: "0"
        }), a.css({
            visibility: "hidden"
        }), a.removeClass("ast-header-sticked"), r(d).trigger("removeStickyClass"), r("html").removeClass("ast-header-stick-fade-active"))
    }, t.prototype.init = function() {
        if (jQuery(this.element)) {
            var t = this,
                e = jQuery(t.element);
            parseInt(t.options.gutter), e.position().top;
            "none" == t.options.header_style ? e.wrap(t.options.wrap).parent().css("min-height", e.outerHeight()).attr("data-stick-support", "on").attr("data-stick-maxwidth", parseInt(t.options.max_width)) : e.wrap(t.options.wrap).attr("data-stick-support", "on").attr("data-stick-maxwidth", parseInt(t.options.max_width)), t.update_attrs(), jQuery(i).on("resize", function() {
                t.stickRelease(t), t.update_attrs(), t.stick_me(t)
            }), jQuery(i).on("scroll", function() {
                t.stick_me(t, "scroll"), jQuery("body").hasClass("ast-sticky-toggled-off") && (t.update_attrs(), t.stick_me(t, "scroll"))
            }), jQuery(d).ready(function(e) {
                t.stick_me(t)
            })
        }
    }, r.fn[a] = function(e) {
        return this.each(function() {
            r.data(this, "plugin_" + a) || r.data(this, "plugin_" + a, new t(this, e))
        })
    };
    var h = jQuery("body"),
        l = h.width(),
        c = astraAddon.stick_header_meta || "default",
        p = astraAddon.header_main_stick || "",
        y = astraAddon.header_main_shrink || "",
        _ = astraAddon.header_above_stick || "",
        m = astraAddon.header_below_stick || "",
        u = astraAddon.header_main_stick_meta || "",
        g = astraAddon.header_above_stick_meta || "",
        k = astraAddon.header_below_stick_meta || "",
        v = astraAddon.site_layout || "",
        b = (astraAddon.site_layout_padded_width, astraAddon.site_layout_box_width || 1200),
        f = (astraAddon.site_content_width, astraAddon.sticky_header_on_devices || "desktop"),
        w = astraAddon.sticky_header_style || "none",
        j = astraAddon.sticky_hide_on_scroll || "",
        x = astraAddon.header_logo_width || "",
        Q = astraAddon.responsive_header_logo_width || "";
    if ("disabled" != c) {
        if ("enabled" === c && (p = u, _ = g, m = k), 0 < r("header .site-logo-img img").length) {
            var C = r("header .site-logo-img img"),
                I = C.attr("height");
            if (void 0 === I && (I = C.height()), 0 == I && (I = ""), -1 === I.toString().indexOf("%") && (I += "px"), "" != Q.desktop || "" != Q.tablet || "" != Q.mobile) var S = "<style type='text/css' id='ast-site-identity-img' class='ast-site-identity-img' > #masthead .site-logo-img .astra-logo-svg { width: " + Q.desktop + "px; } @media (max-width: 768px) { #masthead .site-logo-img .astra-logo-svg { width: " + Q.tablet + "px; } } @media (max-width: 544px) { #masthead .site-logo-img .astra-logo-svg{ width: " + Q.mobile + "px; } }  #masthead .site-logo-img img { max-height: " + I + "; width: auto; } </style>";
            else if ("" != x) S = "<style type='text/css' id='ast-site-identity-img' class='ast-site-identity-img' > #masthead .site-logo-img .astra-logo-svg { width: " + x + "px; } #masthead .site-logo-img img { max-height: " + I + "; width: auto; } </style>";
            r("head").append(S)
        }
        if (p || _ || m) {
            switch (r(d).on("addStickyClass", function() {
                var e = "";
                "1" != p && "on" != p || (e += " ast-primary-sticky-header-active"), "1" != _ && "on" != _ || (e += " ast-above-sticky-header-active"), "1" != m && "on" != m || (e += " ast-below-sticky-header-active"), r("body").addClass(e)
            }), r(d).on("removeStickyClass", function() {
                var e = "";
                "1" != p && "on" != p || (e += " ast-primary-sticky-header-active"), "1" != _ && "on" != _ || (e += " ast-above-sticky-header-active"), "1" != m && "on" != m || (e += " ast-below-sticky-header-active"), r("body").removeClass(e)
            }), v) {
                case "ast-box-layout":
                    l = parseInt(b)
            }
            jQuery(d).ready(function(e) {
                if ("1" == j) "1" == y && jQuery("#ast-fixed-header").addClass("ast-sticky-shrunk").stop(), "1" != _ && "on" != _ && jQuery("#ast-fixed-header .ast-above-header").hide(), "1" != p && "on" != p && jQuery("#ast-fixed-header .main-header-bar").hide(), "1" != m && "on" != m && jQuery("#ast-fixed-header .ast-below-header").hide(), jQuery("#ast-fixed-header").astExtSticky({
                    max_width: l,
                    site_layout: v,
                    sticky_on_device: f,
                    header_style: "slide",
                    hide_on_scroll: j
                });
                else if ("none" == w)
                    if ("1" != _ && "on" != _ || jQuery("#masthead .ast-above-header").astExtSticky({
                            max_width: l,
                            site_layout: v,
                            sticky_on_device: f,
                            header_style: w,
                            hide_on_scroll: j
                        }), "1" != p && "on" != p || "1" != m && "on" != m) {
                        if ("1" == p || "on" == p) {
                            var t = "";
                            y && (t = {
                                padding_top: "",
                                padding_bottom: ""
                            }), jQuery("#masthead .main-header-bar").astExtSticky({
                                dependent: ["#masthead .ast-above-header"],
                                max_width: l,
                                site_layout: v,
                                shrink: t,
                                sticky_on_device: f,
                                header_style: w,
                                hide_on_scroll: j
                            }), jQuery("#masthead .ast-custom-header").astExtSticky({
                                max_width: l,
                                site_layout: v,
                                shrink: t,
                                sticky_on_device: f,
                                header_style: w,
                                hide_on_scroll: j
                            })
                        }
                        "1" != m && "on" != m || jQuery("body").hasClass("ast-header-break-point") || jQuery("#masthead .ast-below-header").astExtSticky({
                            dependent: ["#masthead .main-header-bar", "#masthead .ast-above-header"],
                            max_width: l,
                            site_layout: v,
                            sticky_on_device: f,
                            header_style: w,
                            hide_on_scroll: j
                        })
                    } else jQuery("#masthead .main-header-bar-wrap").wrap('<div class="ast-stick-primary-below-wrapper"></div>'), jQuery("#masthead .ast-below-header-wrap").prependTo(".ast-stick-primary-below-wrapper"), jQuery("#masthead .main-header-bar-wrap").prependTo(".ast-stick-primary-below-wrapper"), jQuery("#masthead .ast-stick-primary-below-wrapper").astExtSticky({
                        dependent: ["#masthead .ast-above-header"],
                        max_width: l,
                        site_layout: v,
                        shrink: t,
                        sticky_on_device: f,
                        header_style: w,
                        hide_on_scroll: j
                    });
                else if (jQuery("#ast-fixed-header").addClass("ast-sticky-shrunk").stop(), "1" != _ && "on" != _ && jQuery("#ast-fixed-header .ast-above-header").hide(), "1" != p && "on" != p && jQuery("#ast-fixed-header .main-header-bar").hide(), "1" != m && "on" != m && jQuery("#ast-fixed-header .ast-below-header").hide(), "1" == _ || "on" == _ || "1" == p || "on" == p || "1" == m || "on" == m) {
                    t = "";
                    y && (t = {
                        padding_top: "",
                        padding_bottom: ""
                    }), jQuery("#ast-fixed-header").astExtSticky({
                        max_width: l,
                        site_layout: v,
                        shrink: t,
                        sticky_on_device: f,
                        header_style: w,
                        hide_on_scroll: j
                    })
                }
                "mobile" != f && "both" != f || (jQuery("#masthead .main-header-menu-toggle").click(function(e) {
                    if (jQuery("#masthead .main-header-menu-toggle").hasClass("toggled")) {
                        if (h.addClass("ast-sticky-toggled-off"), "none" == s.header_style && (jQuery("#masthead .main-header-bar").hasClass("ast-sticky-active") || jQuery("#masthead .ast-stick-primary-below-wrapper").hasClass("ast-sticky-active"))) {
                            var t = jQuery(i).height(),
                                a = 0;
                            jQuery("#masthead .ast-above-header") && jQuery("#masthead .ast-above-header").length && (a = jQuery("#masthead .ast-above-header").height()), "1" == j && jQuery("html").css({
                                overflow: "hidden"
                            }), "1" != y || "1" != p && "on" != p || "1" != m && "on" != m ? jQuery("#masthead .main-header-bar.ast-sticky-active").css({
                                "max-height": t - a + "px",
                                "overflow-y": "auto"
                            }) : jQuery("#masthead .ast-stick-primary-below-wrapper").css({
                                "max-height": t - a + "px",
                                "overflow-y": "auto"
                            })
                        }
                    } else h.addClass("ast-sticky-toggled-off"), jQuery("html").css({
                        overflow: ""
                    }), "1" != y || "1" != p && "on" != p || "1" != m && "on" != m ? jQuery("#masthead .main-header-bar.ast-sticky-active").css({
                        "max-height": "",
                        "overflow-y": ""
                    }) : jQuery("#masthead .ast-stick-primary-below-wrapper").css({
                        "max-height": "",
                        "overflow-y": ""
                    })
                }), jQuery("#ast-fixed-header .main-header-menu-toggle").click(function(e) {
                    if (jQuery("#ast-fixed-header .main-header-menu-toggle").hasClass("toggled")) {
                        var t = jQuery(i).height();
                        "1" == j && jQuery("html").css({
                            overflow: "hidden"
                        }), jQuery("#ast-fixed-header").css({
                            "max-height": t + "px",
                            "overflow-y": "auto"
                        })
                    } else jQuery("html").css({
                        overflow: ""
                    }), jQuery("#ast-fixed-header").css({
                        "max-height": "",
                        "overflow-y": ""
                    })
                }))
            })
        }
    }
}(jQuery, window);
jQuery, jQuery(document).ready(function(o) {
    var r = document.querySelector("#page header");
    jQuery("#ast-scroll-top") && jQuery("#ast-scroll-top").length && (ast_scroll_top = function() {
        var o = jQuery("#ast-scroll-top"),
            e = o.css("content"),
            t = o.data("on-devices");
        if (e = e.replace(/[^0-9]/g, ""), "both" == t || "desktop" == t && "769" == e || "mobile" == t && "" == e) {
            var l = window.pageYOffset || document.body.scrollTop;
            r && r.length ? l > r.offsetHeight + 100 ? o.show() : o.hide() : 300 < jQuery(window).scrollTop() ? o.show() : o.hide()
        } else o.hide()
    }, ast_scroll_top(), jQuery(window).on("scroll", function() {
        ast_scroll_top()
    }), jQuery("#ast-scroll-top").on("click", function(o) {
        o.preventDefault(), jQuery("html,body").animate({
            scrollTop: 0
        }, 200)
    }))
});
! function() {
    var e, t;

    function n(e) {
        var t = document.body.className;
        t = t.replace(e, ""), document.body.className = t
    }

    function r(e) {
        e.style.display = "block", setTimeout(function() {
            e.style.opacity = 1
        }, 1)
    }

    function s(e) {
        e.style.opacity = "", setTimeout(function() {
            e.style.display = ""
        }, 200)
    }

    function l(e) {
        if (document.body.classList.contains("ast-header-break-point")) {
            var t = document.querySelector(".main-navigation"),
                a = document.querySelector(".main-header-bar");
            if (null !== a && null !== t) {
                var o = t.offsetHeight,
                    n = a.offsetHeight;
                if (o && !document.body.classList.contains("ast-no-toggle-menu-enable")) var s = parseFloat(o) - parseFloat(n);
                else s = parseFloat(n);
                e.style.maxHeight = Math.abs(s) + "px"
            }
        }
    }
    e = "iPhone" == navigator.userAgent.match(/iPhone/i) ? "iphone" : "", t = "iPod" == navigator.userAgent.match(/iPod/i) ? "ipod" : "", document.body.className += " " + e, document.body.className += " " + t;
    for (var a = document.querySelectorAll("a.astra-search-icon:not(.slide-search)"), o = 0; a.length > o; o++) a[o].onclick = function(e) {
        if (e.preventDefault(), e || (e = window.event), this.classList.contains("header-cover"))
            for (var t = document.querySelectorAll(".ast-search-box.header-cover"), a = 0; a < t.length; a++)
                for (var o = t[a].parentNode.querySelectorAll("a.astra-search-icon"), n = 0; n < o.length; n++) o[n] == this && (r(t[a]), t[a].querySelector("input.search-field").focus(), l(t[a]));
        else if (this.classList.contains("full-screen")) {
            var s = document.getElementById("ast-seach-full-screen-form");
            s.classList.contains("full-screen") && (r(s), c = "full-screen", document.body.className += " " + c, s.querySelector("input.search-field").focus())
        }
        var c
    };
    for (var c = document.getElementsByClassName("close"), i = (o = 0, c.length); o < i; ++o) c[o].onclick = function(e) {
        e || (e = window.event);
        for (var t = this;;) {
            if (t.parentNode.classList.contains("ast-search-box")) {
                s(t.parentNode), n("full-screen");
                break
            }
            if (t.parentNode.classList.contains("site-header")) break;
            t = t.parentNode
        }
    };
    document.onkeydown = function(e) {
        if (27 == e.keyCode) {
            var t = document.getElementById("ast-seach-full-screen-form");
            null != t && (s(t), n("full-screen"));
            for (var a = document.querySelectorAll(".ast-search-box.header-cover"), o = 0; o < a.length; o++) s(a[o])
        }
    }, window.addEventListener("resize", function() {
        for (var e = document.querySelectorAll(".ast-search-box.header-cover"), t = 0; t < e.length; t++) e[t].style.maxHeight = "", e[t].style.opacity = "", e[t].style.display = ""
    })
}();