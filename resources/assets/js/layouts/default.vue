<template>
  <div class="main-layout">
    <div class="wrapper">

      <!-- Main Header -->
      <header class="main-header clearfix">

        <!-- Logo -->
        <router-link :to="{ name: 'dashboard' }" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Д</b>З</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg">{{ appName }}</span>
        </router-link>

        <!-- Header Navbar -->
        <top-line/>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <left-menu/>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- <div class="dev-notification">
          <h3 class="dev-notification__title">Что нового?</h3>
          <ul class="dev-notification-list">
            <li class="dev-notification-item">Обмен сообщениями</li>
            <li class="dev-notification-item">Нововведение 2</li>
            <li class="dev-notification-item">Нововведение 3</li>
          </ul>
        </div> -->
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            {{ $route.meta.title || $route.meta.breadcrumb }}
            <!-- <small>Optional description</small> -->
          </h1>
          <ol v-if="$breadcrumbs.length !== 1" class="breadcrumb">
            <li v-for="(crumb, key) in $breadcrumbs" :key="key">
              <router-link :to="crumb.path">{{ crumb.meta.breadcrumb }}</router-link>
            </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content container-fluid">

          <child/>

        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <!-- To the right -->
        <!-- <div class="pull-right hidden-xs">
          Anything you want
        </div> -->
        <!-- Default to the left -->
        &copy; {{ new Date().getFullYear() }} Все права защищены | E-Diary (beta v.1.3.0) разработал <a href="https://vk.com/id179880969" target="_blank">Гардейчик С.М.</a>
      </footer>

      <!-- Control Sidebar -->
      <control-sidebar/>

      <div class="contral-btn-set" v-if="user.role == 'admin'">
        <button type="button" class="btn-fab btn-fab--red" data-toggle="modal" data-target="#add-user">
          <i class="fa fa-user-plus" aria-hidden="true"></i>
        </button>
      </div>

    </div>
    <!-- ./wrapper -->

    <!-- Modal -->
    <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Выйти из системы?</h4>
          </div>
          <div class="modal-body">Вы действительно хотите выйти из системы?</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="button" class="btn btn-primary" @click="logout" data-dismiss="modal">Выйти</button>
          </div>
        </div>
      </div>
    </div>
    <div class="modal fade" id="remove-user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Удаление аккаунта</h4>
          </div>
          <div class="modal-body">Вы действительно хотите удалить свой аккаунт? Все данные будут утеряны.</div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
            <button type="button" class="btn btn-primary" @click="remove" data-dismiss="modal">Удалить</button>
          </div>
        </div>
      </div>
    </div>
    <add-user-popup v-if="user.role == 'admin'"/>
  </div>
</template>

<script>
import axios from 'axios';
import { mapGetters } from 'vuex';

import TopLine from "~/components/TopLine";
import LeftMenu from "~/components/LeftMenu";
import ControlSidebar from "~/components/ControlSidebar";
import AddUserPopup from "~/components/users/AddUserPopup";

export default {
  name: "MainLayout",

  data: () => ({
    appName: window.config.appName
  }),

  metaInfo() {
    return {
      pageTitle: ''
    }
  },

  computed: mapGetters({
    user: 'auth/user'
  }),

  components: {
    TopLine,
    LeftMenu,
    ControlSidebar,
    AddUserPopup
  },

  mounted () {

    /* Layout()
    * ========
    * Implements AdminLTE layout.
    * Fixes the layout height in case min-height fails.
    *
    * @usage activated automatically upon window load.
    *        Configure any options by passing data-option="value"
    *        to the body tag.
    */
    +(function($) {
      "use strict";

      var DataKey = "lte.layout";

      var Default = {
        slimscroll: true,
        resetHeight: true
      };

      var Selector = {
        wrapper: ".wrapper",
        contentWrapper: ".content-wrapper",
        layoutBoxed: ".layout-boxed",
        mainFooter: ".main-footer",
        mainHeader: ".main-header",
        sidebar: ".sidebar",
        controlSidebar: ".control-sidebar",
        fixed: ".fixed",
        sidebarMenu: ".sidebar-menu",
        logo: ".main-header .logo"
      };

      var ClassName = {
        fixed: "fixed",
        holdTransition: "hold-transition"
      };

      var Layout = function(options) {
        this.options = options;
        this.bindedResize = false;
        this.activate();
      };

      Layout.prototype.activate = function() {
        this.fix();
        this.fixSidebar();

        $("body").removeClass(ClassName.holdTransition);

        if (this.options.resetHeight) {
          $("body, html, " + Selector.wrapper).css({
            height: "auto",
            "min-height": "100%"
          });
        }

        if (!this.bindedResize) {
          $(window).resize(
            function() {
              this.fix();
              this.fixSidebar();

              $(Selector.logo + ", " + Selector.sidebar).one(
                "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                function() {
                  this.fix();
                  this.fixSidebar();
                }.bind(this)
              );
            }.bind(this)
          );

          this.bindedResize = true;
        }

        $(Selector.sidebarMenu).on(
          "expanded.tree",
          function() {
            this.fix();
            this.fixSidebar();
          }.bind(this)
        );

        $(Selector.sidebarMenu).on(
          "collapsed.tree",
          function() {
            this.fix();
            this.fixSidebar();
          }.bind(this)
        );
      };

      Layout.prototype.fix = function() {
        // Remove overflow from .wrapper if layout-boxed exists
        $(Selector.layoutBoxed + " > " + Selector.wrapper).css(
          "overflow",
          "hidden"
        );

        // Get window height and the wrapper height
        var footerHeight = $(Selector.mainFooter).outerHeight() || 0;
        var neg = $(Selector.mainHeader).outerHeight() + footerHeight;
        var windowHeight = $(window).height();
        var sidebarHeight = $(Selector.sidebar).height() || 0;

        // Set the min-height of the content and sidebar based on
        // the height of the document.
        if ($("body").hasClass(ClassName.fixed)) {
          $(Selector.contentWrapper).css(
            "min-height",
            windowHeight - footerHeight
          );
        } else {
          var postSetHeight;

          if (windowHeight >= sidebarHeight) {
            $(Selector.contentWrapper).css("min-height", windowHeight - neg);
            postSetHeight = windowHeight - neg;
          } else {
            $(Selector.contentWrapper).css("min-height", sidebarHeight);
            postSetHeight = sidebarHeight;
          }

          // Fix for the control sidebar height
          var $controlSidebar = $(Selector.controlSidebar);
          if (typeof $controlSidebar !== "undefined") {
            if ($controlSidebar.height() > postSetHeight)
              $(Selector.contentWrapper).css(
                "min-height",
                $controlSidebar.height()
              );
          }
        }
      };

      Layout.prototype.fixSidebar = function() {
        // Make sure the body tag has the .fixed class
        if (!$("body").hasClass(ClassName.fixed)) {
          if (typeof $.fn.slimScroll !== "undefined") {
            $(Selector.sidebar)
              .slimScroll({ destroy: true })
              .height("auto");
          }
          return;
        }

        // Enable slimscroll for fixed layout
        if (this.options.slimscroll) {
          if (typeof $.fn.slimScroll !== "undefined") {
            // Destroy if it exists
            // $(Selector.sidebar).slimScroll({ destroy: true }).height('auto')

            // Add slimscroll
            $(Selector.sidebar).slimScroll({
              height:
                $(window).height() - $(Selector.mainHeader).height() + "px",
              color: "rgba(0,0,0,0.2)",
              size: "3px"
            });
          }
        }
      };

      // Plugin Definition
      // =================
      function Plugin(option) {
        return this.each(function() {
          var $this = $(this);
          var data = $this.data(DataKey);

          if (!data) {
            var options = $.extend(
              {},
              Default,
              $this.data(),
              typeof option === "object" && option
            );
            $this.data(DataKey, (data = new Layout(options)));
          }

          if (typeof option === "string") {
            if (typeof data[option] === "undefined") {
              throw new Error("No method named " + option);
            }
            data[option]();
          }
        });
      }

      var old = $.fn.layout;

      $.fn.layout = Plugin;
      $.fn.layout.Constuctor = Layout;

      // No conflict mode
      // ================
      $.fn.layout.noConflict = function() {
        $.fn.layout = old;
        return this;
      };

      // Layout DATA-API
      // ===============
      Plugin.call($("body"));
    })(jQuery)
  },

  destroyed () {
    $('body').removeData('lte.layout');
  },

  methods: {
    async logout() {
      // Log out the user.
      await this.$store.dispatch("auth/logout");

      // Redirect to login.
      this.$router.push({ name: "login" });
    },
    async remove() {
      try {
        await axios.delete('/api/user', {
          params: { ids: this.user.id }
        })

        // Log out the user.
        this.$store.commit("auth/LOGOUT");

        // Redirect to login.
        this.$router.push({ name: "login" });
      } catch (error) {
        IziToast.error({ message: error.response.data.message })
      }
    }
  }
};
</script>

<style lang="scss" scoped>
	body.top-line-fixed {
		.main-header {
			position: fixed;
			width: 100%;
		}
		.content-wrapper {
			margin-top: 50px;
		}
	}
</style>
