!function(e){function t(n){if(r[n])return r[n].exports;var o=r[n]={i:n,l:!1,exports:{}};return e[n].call(o.exports,o,o.exports,t),o.l=!0,o.exports}var r={};t.m=e,t.c=r,t.d=function(e,r,n){t.o(e,r)||Object.defineProperty(e,r,{configurable:!1,enumerable:!0,get:n})},t.n=function(e){var r=e&&e.__esModule?function(){return e.default}:function(){return e};return t.d(r,"a",r),r},t.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t.p="",t(t.s=0)}([function(e,t,r){"use strict";Object.defineProperty(t,"__esModule",{value:!0});r(1)},function(e,t,r){"use strict";function n(e){var t=e.shortcode;return t.length>0?wp.element.createElement("div",null,t):""}var o=r(2),c=(r.n(o),r(3)),i=(r.n(c),r(4)),a=(r.n(i),wp.i18n.__),l=wp.blocks.registerBlockType;wp.editor.RichText;l("cgb/block-ichart-free-block",{title:a("Quick iChart"),icon:"chart-line",category:"common",keywords:[a("Quick iChart"),a("Quick iChart")],attributes:{shortcode:{type:"string",default:""}},edit:function(e){function t(e){jQuery("#ichart_shortcode_generator_free_meta_block").prop("disabled",!0),jQuery(e.target).addClass("currently_editing"),jQuery("#ichart-qcld-chart-field-modal").show()}function r(e){var t=jQuery("#ichart_shortcode_container").val();o({shortcode:t}),console.log({shortcode:t})}var n=e.attributes.shortcode,o=e.setAttributes;return jQuery(document).on("click",".ichart_copy_close",function(e){e.preventDefault(),jQuery(".currently_editing").next("#insert_shortcode").trigger("click"),jQuery(document).find(".ichart-chart-field-modal-close").trigger("click"),jQuery("#ichart-qcld-chart-field-modal").hide()}),jQuery(document).on("click",".ichart-chart-field-modal-close",function(){jQuery(".currently_editing").removeClass("currently_editing"),jQuery("#ichart_shortcode_generator_free_meta_block").prop("disabled",!1),jQuery("#ichart-qcld-chart-field-modal").hide()}),wp.element.createElement("div",{className:e.className},wp.element.createElement("input",{type:"button",id:"ichart_shortcode_generator_free_meta_block",onClick:t,className:"button button-primary button-large",value:"Generate iChart Shortcode"}),wp.element.createElement("input",{type:"button",id:"insert_shortcode",onClick:r,className:"button button-primary button-large",value:"Test iChart Shortcode"}),wp.element.createElement("br",null),n)},save:function(e){var t=e.attributes.shortcode;return wp.element.createElement("div",null,wp.element.createElement(n,{shortcode:t}))}})},function(e,t){},function(e,t){},function(e,t){e.exports=wp.components}]);