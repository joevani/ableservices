/**
 * Copyright 2016 Google Inc. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
*/

// DO NOT EDIT THIS GENERATED OUTPUT DIRECTLY!
// This file should be overwritten as part of your build process.
// If you need to extend the behavior of the generated service worker, the best approach is to write
// additional code and include it using the importScripts option:
//   https://github.com/GoogleChrome/sw-precache#importscripts-arraystring
//
// Alternatively, it's possible to make changes to the underlying template file and then use that as the
// new base for generating output, via the templateFilePath option:
//   https://github.com/GoogleChrome/sw-precache#templatefilepath-string
//
// If you go that route, make sure that whenever you update your sw-precache dependency, you reconcile any
// changes made to this original template file with your modified copy.

// This generated service worker JavaScript will precache your site's resources.
// The code needs to be saved in a .js file at the top-level of your site, and registered
// from your pages in order to be used. See
// https://github.com/googlechrome/sw-precache/blob/master/demo/app/js/service-worker-registration.js
// for an example of how you can register this script and handle various service worker events.

/* eslint-env worker, serviceworker */
/* eslint-disable indent, no-unused-vars, no-multiple-empty-lines, max-nested-callbacks, space-before-function-paren, quotes, comma-spacing */
'use strict';

var precacheConfig = [["Nandova/accordion.html","9e47a522a5ffdda8ccea5e414dcc8835"],["Nandova/affiliate.html","3fb9cea5b1068444f5fbe6755e740383"],["Nandova/blank.html","3407a15051630d3b8119ea23b87a152d"],["Nandova/buy-sell.html","6d7bc51c9f9292231b5ef53cd305a86b"],["Nandova/charts.html","4155ad3e163cab1cfd1180fdba35b53c"],["Nandova/checkbox-list.html","e3da9be944018a42115e4743de0e4215"],["Nandova/contact.html","cec2b526ff6876f5343987c52c6cc950"],["Nandova/css/animate.css","57db4a2811f951ff841fb4f77220d95b"],["Nandova/css/bootstrap.min.css","236037867904ecbd44ed536fc548c489"],["Nandova/css/cryptocoins.css","24d0845eccc71bef68e9745ec165f50f"],["Nandova/css/font-awesome.min.css","00cec4cb8d6013ce42a5e968d70294e3"],["Nandova/css/global.style.css","4da1bfaf685c82ab3be57df1d5bc5cf0"],["Nandova/css/intro-style.css","5850b66ae113b21081cba29ea560d406"],["Nandova/css/swiper.min.css","d730536fd5fedf6bac07c3e6e7843d1a"],["Nandova/fonts/cryptocoins.css","8f877e75acb82932257d605b57c01b58"],["Nandova/fonts/cryptocoins.ttf","fa16c0d7fa0beccfa8534790552cfc79"],["Nandova/fonts/cryptocoins.woff","0265924a671b4309a48ab9a78519a343"],["Nandova/fonts/cryptocoins.woff2","8e447dff2cb527d39a0755cba725598d"],["Nandova/fonts/fontawesome-webfont3e6e3e6e.eot","674f50d287a8c48dc19ba404d20fe713"],["Nandova/fonts/fontawesome-webfont3e6e3e6e.svg","912ec66d7572ff821749319396470bde"],["Nandova/fonts/fontawesome-webfont3e6e3e6e.ttf","b06871f281fee6b241d60582ae9369b9"],["Nandova/fonts/fontawesome-webfont3e6e3e6e.woff","fee66e712a8a08eef5805a46892932ad"],["Nandova/fonts/fontawesome-webfont3e6e3e6e.woff2","af7ae505a9eed503f8b8e6982036873e"],["Nandova/fonts/fontawesome-webfontd41dd41d.eot","674f50d287a8c48dc19ba404d20fe713"],["Nandova/forgot-password.html","eacfbd9b9c8146885d64ac18bf5b9374"],["Nandova/forms.html","3aa36db13c889dd5089d8a585fa6865c"],["Nandova/img/assets/feature-1.svg","46822dbaf8d82fd2ca47aa48a2869902"],["Nandova/img/assets/feature-2.svg","bae7e971645fdae6c641ecb1b9401ad8"],["Nandova/img/assets/feature-3.svg","e43202bf36823ce94a7e3c26518e51af"],["Nandova/img/assets/feature-4.svg","49181504c4146959d072029d30ff49ea"],["Nandova/img/content/curve.svg","f72034538abbddc8000da8f34d8091b3"],["Nandova/img/up-down.svg","1ace55c492b6a1e0bb556b658b50ae95"],["Nandova/index.html","196b8a74e7ae1da75dc28271fcdeef86"],["Nandova/js/app-charts.js","62a915820dc037cc4be9df6266c7a278"],["Nandova/js/global.script.js","df09e30ffc56a23737d3fcb6e598218d"],["Nandova/js/jquery-3.2.1.min.js","c9f5aeeca3ad37bf2aa006139b935f0a"],["Nandova/js/swiper.min.js","cabdd76e521b31cec9589102858f42e3"],["Nandova/link-list-two-column.html","b30cf6dec3efae4311a89c96f3ed6961"],["Nandova/link-list.html","fb16c38799023579e0a607b7a8190f5f"],["Nandova/login.html","a26521ad37c1d6fa22ac9a6885e1f2a6"],["Nandova/plugins/c3-chart/c3.css","12a39db811e69b58bb86933c43e4d93a"],["Nandova/plugins/c3-chart/c3.custom.js","471caaf62b9aa304b026d91ae6ad2f27"],["Nandova/plugins/c3-chart/c3.min.js","3ee296873e27122f1d7bd4030fa4bd13"],["Nandova/plugins/c3-chart/d3.min.js","d1784140c4634b660528c86fac758217"],["Nandova/plugins/flot/custom/area.js","cb378e1e37dcfe009239d2b042586769"],["Nandova/plugins/flot/custom/combine-chart-compare.js","3158f650b8f38d10217485bf4377c781"],["Nandova/plugins/flot/custom/combine-chart.js","87f0fadaa04171a880e383336f92e235"],["Nandova/plugins/flot/custom/donut.js","5ed86f0b5c8c90e1b749745883ee924a"],["Nandova/plugins/flot/custom/horizontal.js","1dd8ca2e264c8196d4a518ed92e6ffc1"],["Nandova/plugins/flot/custom/line.js","a6d2189e5f595706809b0e014976c70f"],["Nandova/plugins/flot/custom/pie.js","26e4cb202a1092e0e3da747063230cfd"],["Nandova/plugins/flot/custom/realtime.js","db15ccba815a3315957d7906cff71a92"],["Nandova/plugins/flot/custom/rectangular-pie.js","422ade3cca67b6d7f000c880e03c6249"],["Nandova/plugins/flot/custom/scatter.js","0e7bed69a4bca43cf683e932db0d3598"],["Nandova/plugins/flot/custom/stacked-area.js","1a1b117d3aa1c0eb43f56f4e608f5d98"],["Nandova/plugins/flot/custom/stacked-horizontal.js","93bf447d4c78de71cbc7fda9fd7d76b0"],["Nandova/plugins/flot/custom/stacked-vertical.js","a652a65cb56ee48609e0f1a4d395406d"],["Nandova/plugins/flot/custom/vertical.js","891e22f50a6be399bdbabce859aa71f8"],["Nandova/plugins/flot/jquery.flot.html","16bfb14481c506fb2d335381e19fb01d"],["Nandova/plugins/flot/jquery.flot.min.js","c997170b27ea52ed74f6f43d338eea23"],["Nandova/plugins/flot/jquery.flot.pie.min.js","4c5dd184344ef5b4b80d3cb5208d0fdc"],["Nandova/plugins/flot/jquery.flot.resize.min.js","31e21fd1856200b80b1ed9f64f78dee0"],["Nandova/plugins/flot/jquery.flot.stack.min.js","36efc25bd21112ead30b411a7ebe3054"],["Nandova/plugins/flot/jquery.flot.time.min.js","0881020d81c98c180dbc32bcfda83f0a"],["Nandova/plugins/flot/jquery.flot.tooltip.min.js","89ba0ab3494eeeb01feae950f872de0d"],["Nandova/plugins/jquery-sparkline/jquery.sparkline.js","82e875d7389c106d4d08d4fc56dc7664"],["Nandova/plugins/jquery.flot.spline/jquery.flot.spline.js","adc89eeb340f9adad65d4d4f780599bc"],["Nandova/plugins/jquery.flot.tooltip/js/jquery.flot.tooltip.js","6ed80eebf55131c9a7d4f369e6af4060"],["Nandova/plugins/sidebysideimproved/jquery.flot.orderBars.js","ea646afdae5e8c0ffdee1e8953c1c2ca"],["Nandova/plugins/smartphoto/css/smartphoto.min.css","998043e923ea588115c68a56b67f9384"],["Nandova/plugins/smartphoto/js/smartphoto.min.js","dba8235cc9da909f386f3b79d8f61509"],["Nandova/plugins/turbo-slider/turbo.css","dae8916370387f7849a925bf00a3f0ad"],["Nandova/plugins/turbo-slider/turbo.min.js","fc34ac5acf476a52734e5ba180287bef"],["Nandova/popup.html","73c5cf1599d2d0c7c3b85a467d0002c8"],["Nandova/profile.html","47d707a9a486b384a6b377a8f342292b"],["Nandova/search-result.html","9f11786f6914ddcde202af10ff93ec93"],["Nandova/setting.html","08f186953c7907acecb4c90e4aaec88b"],["Nandova/signup.html","dae7ec11ff72e24a5373880e41c370fd"],["Nandova/tab-bottom.html","4fca4fa1fb567e90214497d3a672d425"],["Nandova/tab-top.html","37edf58b3256d8022505a2d159adcb05"],["Nandova/trading.html","f6f3fda28c3397e3988a84eb608351c0"],["Nandova/wallet.html","908cb289927292b459a695f6a1d5e4bd"],["Nandova/wizard-default.html","8f1e47e40d41c50bab2c1bf1ea7bdadf"],["Nandova/wizard-fullscreen.html","23b2aa9075517c1bb2069f5c8339d009"],["capstone/Documentation/css/bootstrap.css","abbbbf46899e2080b11893577e475985"],["capstone/Documentation/css/bootstrap.min.css","bb884d3b6b6b09481c5dc25fb4fac7e5"],["capstone/Documentation/css/prettify.css","90bab40e267fb81887b59cbe5c39cf0c"],["capstone/Documentation/css/styles.css","16121148bfcd676a319a3c4d90f39a48"],["capstone/Documentation/fonts/glyphicons-halflings-regular.eot","f4769f9bdb7466be65088239c12046d1"],["capstone/Documentation/fonts/glyphicons-halflings-regular.svg","f721466883998665b87923b92dea655b"],["capstone/Documentation/fonts/glyphicons-halflings-regular.ttf","e18bbf611f2a2e43afc071aa2f4e1512"],["capstone/Documentation/fonts/glyphicons-halflings-regular.woff","fa2772327f55d8198301fdb8bcfc8158"],["capstone/Documentation/fonts/glyphicons-halflings-regular.woff2","448c34a56d699c29117adc64c43affeb"],["capstone/Documentation/fonts/ws-ui-light.eot","50c9000a3b0284e1ec0cd8eaa1ffcc01"],["capstone/Documentation/fonts/ws-ui-light.woff","3eae03e7741a66b37096102e0d2cbc62"],["capstone/Documentation/fonts/ws-ui-semibold.eot","2ac17297e6e8b941c40ff9d0ecabe596"],["capstone/Documentation/fonts/ws-ui-semibold.woff","520b48ebd22503caa2e2aae90e77dce8"],["capstone/Documentation/fonts/ws-ui.eot","e9df799927462f0971f4929783343b49"],["capstone/Documentation/fonts/ws-ui.woff","2d3b490f355582b20fbe490bb18511a3"],["capstone/Documentation/index.html","d7f7c6070dde69f580cdb063099f30f9"],["capstone/Documentation/js/bootstrap.js","964bfad71509fd1e87e9349e3f277f6c"],["capstone/Documentation/js/bootstrap.min.js","1ae0e64754a542cbea996dec63c326fd"],["capstone/Documentation/js/jquery-2.1.1.min.js","9a094379d98c6458d480ad5a51c4aa27"],["capstone/Documentation/js/jquery.easing.min.js","cb13ce6e9b41da9553d9d9266dcb6f62"],["capstone/Documentation/js/jquery.js","ee092541bc79668e3e0a7b76d2faf00c"],["capstone/Documentation/js/jquery.plugins.js","a4bb9c6d1e8c40b627f25cedc0a37c92"],["capstone/Documentation/js/prettify.js","c298bb0f4acbea531dd783e2d25ed251"],["capstone/Template/alert.html","fb9ad81b8a601de79f2e38d20b92043c"],["capstone/Template/assets/css/animate.min.css","178b651958ceff556cbc5f355e08bbf1"],["capstone/Template/assets/css/bootstrap.min.css","ef41f5b4179c7319e82175e3fd9795a1"],["capstone/Template/assets/css/dataTables.bootstrap4.min.css","6451f46aba0637a5c1004aedf81f9eca"],["capstone/Template/assets/css/font-awesome.css","553a20cd84c46cc752c594a49a24bdaa"],["capstone/Template/assets/css/font-awesome.min.css","ab33da83999dda3023e9668e53d5acd0"],["capstone/Template/assets/css/fullcalendar.css","f45f3cc0f448aac7e78672456c14bb89"],["capstone/Template/assets/css/ionicons.css","40d22f34a221b6676b7c036f1b217c21"],["capstone/Template/assets/css/jquery.easy-pie-chart.css","9f0fc01e1ca6cada785140ca5ccd462d"],["capstone/Template/assets/css/jquery.mCustomScrollbar.css","fcee0248cf63359cee5be28a64ed3840"],["capstone/Template/assets/css/jquery.steps.css","f540d4c06b6603395f46a34bd221007a"],["capstone/Template/assets/css/line-awesome.css","d728fdaa66b1eba0382c7c20bc2fcc49"],["capstone/Template/assets/css/owl.carousel.min.css","b2752a850d44f50036628eeaef3bfcfa"],["capstone/Template/assets/css/responsive.css","0654208435e36a846e2ebe52385a4ac1"],["capstone/Template/assets/css/semantic.min.css","3756304bb6e01b5a199e3d0e08ae723c"],["capstone/Template/assets/css/simple-line-icons.css","26a36d3b280acea9c4742a08f0e02362"],["capstone/Template/assets/css/style.css","0a5b9e24d4a0e63427941fc225d409eb"],["capstone/Template/assets/css/tree.css","4e8bcf7d21c56acdff9b72fa9c5856b8"],["capstone/Template/assets/css/weather-icons.min.css","76148b014865ee88debb5118eb232794"],["capstone/Template/assets/fonts/Simple-Line-Icons.eot","f33df365d6d0255b586f2920355e94d7"],["capstone/Template/assets/fonts/Simple-Line-Icons.svg","73a932562a1e314703469d0a352fcda9"],["capstone/Template/assets/fonts/Simple-Line-Icons.ttf","d2285965fe34b05465047401b8595dd0"],["capstone/Template/assets/fonts/Simple-Line-Icons.woff","78f07e2c2a535c26ef21d95e41bd7175"],["capstone/Template/assets/fonts/Simple-Line-Icons.woff2","0cb0b9c589c0624c9c78dd3d83e946f6"],["capstone/Template/assets/fonts/fontawesome-webfont3e6e.eot","674f50d287a8c48dc19ba404d20fe713"],["capstone/Template/assets/fonts/fontawesome-webfont3e6e.html","405fc2f2462b05fac2ae9983a3c8fca6"],["capstone/Template/assets/fonts/fontawesome-webfont3e6e.svg","acf3dcb7ff752b5296ca23ba2c7c2606"],["capstone/Template/assets/fonts/fontawesome-webfont3e6e.ttf","b06871f281fee6b241d60582ae9369b9"],["capstone/Template/assets/fonts/fontawesome-webfont3e6e.woff","fee66e712a8a08eef5805a46892932ad"],["capstone/Template/assets/fonts/fontawesome-webfontd41d.eot","674f50d287a8c48dc19ba404d20fe713"],["capstone/Template/assets/fonts/glyphicons-halflings-regular-2.html","c62167552f529c6255f08d55da4f76cc"],["capstone/Template/assets/fonts/glyphicons-halflings-regular-3.html","2424cb462fa73183b895a9e3aeb8e2d8"],["capstone/Template/assets/fonts/glyphicons-halflings-regular-4.html","425bf072c161f36e7a9c1bcfb1a7fef3"],["capstone/Template/assets/fonts/glyphicons-halflings-regular.html","f99024b58ee6624dcea68222aab6aa78"],["capstone/Template/assets/fonts/glyphicons-halflings-regulard41d.html","f99024b58ee6624dcea68222aab6aa78"],["capstone/Template/assets/fonts/ionicons.eot","2c2ae068be3b089e0a5b59abb1831550"],["capstone/Template/assets/fonts/ionicons.svg","c037dbbc0e6790f30e824a50010df5fb"],["capstone/Template/assets/fonts/ionicons.ttf","24712f6c47821394fba7942fbb52c3b2"],["capstone/Template/assets/fonts/ionicons.woff","05acfdb568b3df49ad31355b19495d4a"],["capstone/Template/assets/fonts/line-awesome.eot","3f85d8035b4ccd91d2a1808dd22b7684"],["capstone/Template/assets/fonts/line-awesome.svg","131b7f1e91a652791f08f5ccfe702645"],["capstone/Template/assets/fonts/line-awesome.ttf","4d42f5f0c62a8f51e876c14575354a6e"],["capstone/Template/assets/fonts/line-awesome.woff","8b1290595e57e1d49d95ff3fa1129ecc"],["capstone/Template/assets/fonts/line-awesome.woff2","452a5b42cb4819f09d35bcf6cbdb24c1"],["capstone/Template/assets/fonts/revicons/revicons.eot","2feb69ccb596730c72920c6ba3e37ef8"],["capstone/Template/assets/fonts/revicons/revicons.svg","ac38240b01066dbfdb6b548b8bee04d3"],["capstone/Template/assets/fonts/revicons/revicons.ttf","17629a5dfe0d3c3946cf401e1895f091"],["capstone/Template/assets/fonts/revicons/revicons.woff","04eb8fc57f27498e5ae37523e3bfb2c7"],["capstone/Template/assets/fonts/weathericons-regular-webfont.eot","4b658767da6bd92ce2addb3ce512784d"],["capstone/Template/assets/fonts/weathericons-regular-webfont.html","2c1e3f585874e335060e45ecb40c8871"],["capstone/Template/assets/fonts/weathericons-regular-webfont.svg","ed0943f224d6a39871066f569a18fa60"],["capstone/Template/assets/fonts/weathericons-regular-webfont.ttf","4618f0de2a818e7ad3fe880e0b74d04a"],["capstone/Template/assets/fonts/weathericons-regular-webfont.woff","8cac70ebda3f23ce472110d9f21e8593"],["capstone/Template/assets/fonts/weathericons-regular-webfontd41d.eot","4b658767da6bd92ce2addb3ce512784d"],["capstone/Template/assets/images/check.svg","2af2071af883db93884ee0cce37c90e5"],["capstone/Template/assets/images/radio - Copy.svg","00ea2139f7c282a7436b607990bad915"],["capstone/Template/assets/images/radio.svg","00ea2139f7c282a7436b607990bad915"],["capstone/Template/assets/images/tab_img1.svg","55cebd900353b1f93a3c2dfb16ca0823"],["capstone/Template/assets/js/Chart.bundle.js","4474bf616330ffc4685f22a9753915a0"],["capstone/Template/assets/js/Chart.min.js","2eb1ab5806eff3fd09d5d05c02b7bcdd"],["capstone/Template/assets/js/accounting.min.js","8ec171b4049015f57dd615d333f8a0dd"],["capstone/Template/assets/js/bootstrap.min.js","3ce8606e87ad867cc9b22b8974f41f16"],["capstone/Template/assets/js/calendar-basic-init.js","f6ae4b349a635adacdea01ad164d6251"],["capstone/Template/assets/js/calendar-external-events-init.js","75a8d29d7e4a88562629e1ffa21ab5ed"],["capstone/Template/assets/js/calendar-list-init.js","b930b21e15b576c52a693c18b76e8481"],["capstone/Template/assets/js/chart.js","ef891b491ccbee110a13f0f29718b7f4"],["capstone/Template/assets/js/chartjs-init-alt.js","96d24f8bf56c18774383848ef02dc60a"],["capstone/Template/assets/js/chartjs-init.js","f60553a26e38b8ec85da2ab36e5a1e03"],["capstone/Template/assets/js/custom-chart-init.js","30a622103448e5938ccda867cee275b6"],["capstone/Template/assets/js/custom.js","0071759eec822b37cabe3c0b354c3139"],["capstone/Template/assets/js/dataTables.bootstrap4.min.js","0fa8c58b133e547fc57a31cc05a20e62"],["capstone/Template/assets/js/easy-pie-chart-init.js","df7b986cda132c0aba4041db8b2881a9"],["capstone/Template/assets/js/echarts/echarts-all-3.js","26236d30c612d67147894eb6711d6ede"],["capstone/Template/assets/js/echarts/init-echarts.js","9e3c933112872c9f4848ce6c7977b9bb"],["capstone/Template/assets/js/flot-chart-init.js","820af46d161cd9ea94328d42b8b9b240"],["capstone/Template/assets/js/flot-chart/jquery.flot.crosshair.js","b02b4472d519a86857e31459c5a46661"],["capstone/Template/assets/js/flot-chart/jquery.flot.js","ceb263b4fa467e54108a57af7c6cc95e"],["capstone/Template/assets/js/flot-chart/jquery.flot.pie.js","b871e20dbd41432627ce7fef697b0726"],["capstone/Template/assets/js/flot-chart/jquery.flot.resize.js","4d69f9f968102fafc2beb3e1a2b10453"],["capstone/Template/assets/js/flot-chart/jquery.flot.stack.js","19dd2aa1563635d5dc3a41d743434667"],["capstone/Template/assets/js/flot-chart/jquery.flot.time.js","c21dd2087ac106f3626888bd16c8adad"],["capstone/Template/assets/js/flot-chart/jquery.flot.tooltip.min.js","2c47c18b56acbd717435ae86a5bb84e2"],["capstone/Template/assets/js/form-wizard-init.js","58e5c60e887ae0c3b0ded47ac9266d5e"],["capstone/Template/assets/js/fullcalendar.js","8f83dd674679ca865214e8332d485df5"],["capstone/Template/assets/js/index/morris-chart/morris-init.js","fc21af307e6ab821e6b88b801dd1d1ec"],["capstone/Template/assets/js/index/morris-chart/morris.css","f46dbe0ae122d786160a9429bd32df35"],["capstone/Template/assets/js/index/morris-chart/morris.js","d58d0650f728797c96563eddfb100ac3"],["capstone/Template/assets/js/index/morris-chart/raphael-min.js","cff7291b57fed063caea12147e81b846"],["capstone/Template/assets/js/jquery-jvectormap-1.2.2.min.js","378dde5d37cd1eba1a8329b421a179b4"],["capstone/Template/assets/js/jquery-jvectormap-world-mill-en.js","0baaa9b65bf9b17fecbb958d9537377a"],["capstone/Template/assets/js/jquery-ui.min.js","bcad1d60cf9cb3bb180a1a8339ed5529"],["capstone/Template/assets/js/jquery-validate-init.js","40a69a6b60bc712bda200bb0c39a9fab"],["capstone/Template/assets/js/jquery.dataTables.min.js","a748544ee8c4aa4ed0849dace0aaf550"],["capstone/Template/assets/js/jquery.dcjqaccordion.2.7.js","473f11ac2e5af155680263ad44823348"],["capstone/Template/assets/js/jquery.easy-pie-chart.js","c5c373337295ade56adede6bb6512083"],["capstone/Template/assets/js/jquery.mCustomScrollbar.concat.min.js","9df3cfdcc9b72f1aa24e2e114455ae7a"],["capstone/Template/assets/js/jquery.min.js","98e1d7ae58993c08850cd5910b2086d5"],["capstone/Template/assets/js/jquery.sparkline.js","7bd6c01b00515a93c7bcf016c48dc1c8"],["capstone/Template/assets/js/jquery.steps.min.js","4c5e9f4e84d32b7df69af7420b355e03"],["capstone/Template/assets/js/jquery.stepy.js","5be3c727be539651f575e1eb94d53865"],["capstone/Template/assets/js/jquery.validate.js","52ffad955cd8a4686bc5b5fcff3d9e44"],["capstone/Template/assets/js/jstree.min.js","5629f5a2556f34e0893932130a1c0203"],["capstone/Template/assets/js/moment.min.js","9c58a34f02796276b7e7109af74070cd"],["capstone/Template/assets/js/morris-chart/morris.css","f46dbe0ae122d786160a9429bd32df35"],["capstone/Template/assets/js/morris-chart/morris.js","d58d0650f728797c96563eddfb100ac3"],["capstone/Template/assets/js/morris-chart/raphael-min.js","cff7291b57fed063caea12147e81b846"],["capstone/Template/assets/js/morris-init.js","dbed9ace71015654306c6cfcf1451369"],["capstone/Template/assets/js/owl.carousel.js","47c357c05cb99cedbac2874840319818"],["capstone/Template/assets/js/popper.min.js","b1dbc64f8b1dfe0c089dd55b09bbbc72"],["capstone/Template/assets/js/round-chart.js","d6a4a766be3bdb90550929cdbbdd8486"],["capstone/Template/assets/js/sparkline-init.js","891611436a580797f7cb4116a18fb6b8"],["capstone/Template/assets/js/tether.min.js","1c4a5999a2b43cdd3aaa88a04f24c961"],["capstone/Template/assets/js/underscore-min.js","5e8f9a016c500995317f00b2bf6aa7e8"],["capstone/Template/assets/js/utils.js","b3f404b84e51bd51dea2d40d77c3f127"],["capstone/Template/assets/js/vmap-init.js","1a933d469c00d3001c23a695c511b3a7"],["capstone/Template/buttons.html","b144aee5374973d03c367ca1c94adbaf"],["capstone/Template/calendar-basic.html","7f31cf98a7b324ce79b62c6cf72f4b30"],["capstone/Template/calendar-external-events.html","3063702852f69757ead23bc13b638c76"],["capstone/Template/calendar-list.html","16d4179498923e5355c9c51cc633ad38"],["capstone/Template/cards.html","69032068391b12a24fa1c443d092f913"],["capstone/Template/contact.html","b343d29e92ecc7112c84f4aab5b9a843"],["capstone/Template/course-list.html","021dccf9f6adbfd57df7f71f38ac3640"],["capstone/Template/courses-details.html","8b6d7dc35acd2dd6f8060f21e65ecaa9"],["capstone/Template/dropdown.html","d8cf5c2b4cc7f27d61e7ecb3647a6d08"],["capstone/Template/echart.html","ab727a42dbc95476a13219814fb68165"],["capstone/Template/flot-chart.html","9d16975b1b69e653309f46290f0e5413"],["capstone/Template/form-basic-input.html","f7255e486db6a327c3fbf373afe66bf3"],["capstone/Template/form-checkbox-radio.html","1e133984b5143bcc64296d558815baa0"],["capstone/Template/form-input-group.html","aa6b6b633b3c532d94ed5fd4cf46f588"],["capstone/Template/form-validation-basic.html","7a1a1170b6f73ad2760ffb0d1a9d7806"],["capstone/Template/form-validation-jquery.html","62b683d254e65fb698a872aba91be91a"],["capstone/Template/grid.html","bf3d0b4382517ad812e346b355e6c8a5"],["capstone/Template/icon-font-awesome.html","2b5de3bb10e0e135b1a2861774429892"],["capstone/Template/icon-line-awesome.html","bc6c58f724513265ec1032605fbb1cd0"],["capstone/Template/icon-simple-line.html","56304ab39215a631e3b65fcb1bbc5ff3"],["capstone/Template/index.html","86105fe8d0c68bdaa4e0334ff54023d3"],["capstone/Template/invoice.html","70f9c11a9d654d19283c6d8bd2ee9bf1"],["capstone/Template/lists.html","04588b8b80b5d42f00c75cd2b6b40e80"],["capstone/Template/modal.html","10950cd5f4915f3ec3e3ee82a741bd5c"],["capstone/Template/morris-chart.html","95e6b9c3f3fd77d64c1368597e4a1033"],["capstone/Template/page-login.html","7a2b017c36a924541c074e4d306a0881"],["capstone/Template/page-register.html","ccad90002b80d4c3d932a268a8f27b86"],["capstone/Template/page_404.html","fe8206146e3d844057bbced3862a30d5"],["capstone/Template/popover-tooltips.html","35de856fb4fea788418b2ce1e9412972"],["capstone/Template/portlet-advanced.html","93965bd0a5127f90c9a19974474b11ba"],["capstone/Template/portlet-base.html","7d09e58b0fadceb7c143b26b12906e27"],["capstone/Template/profile.html","239f47cd27dedee065f7ee716caa1b47"],["capstone/Template/progress.html","a824e1259acdc7b890776b12f7b2b318"],["capstone/Template/table-basic.html","bb3e2b5400bb9dcc2e3db0959848c736"],["capstone/Template/table-datatable-ajax.html","b96517e8b0137b0561d170774e111040"],["capstone/Template/table-datatable-show-hide.html","0489e2ddd3b4d246574e3c59a6babeaa"],["capstone/Template/table-datatable.html","001dbea36591654e1ada6b7b9ba4bb16"],["capstone/Template/tabs.html","773b6a1db0c53d9254dfd6e863a9fb16"],["capstone/Template/toastr.html","f25422424400704551ce98e8c2bf9e21"],["capstone/Template/tree.html","7141321ddec567d8dfb8b78847bd5986"],["capstone/Template/typography.html","da746eb5e321e68aec1f14c9a7129aab"],["capstone/Template/widgets-base.html","b5b58b9a39794ae6287111e8015ee014"],["capstone/Template/widgets-chart.html","7dfe898855ca5335d6bc0bc51498f090"],["css/app.css","ca5bdb0d243f78737f00b9e7db9b034c"],["css/core.css","0752b24a8c05ad6de438b578cdc08e7b"],["installevent.js","81a2afbf226537e2199685ec4d06b981"],["js/app-charts.js","62a915820dc037cc4be9df6266c7a278"],["js/app.js","7daa273c597082b7d34a59b460352034"],["js/global.script.js","df09e30ffc56a23737d3fcb6e598218d"],["js/installscript.js","63e96f7402ed365d22c8c8fddc55928e"],["js/jquery-3.2.1.min.js","c9f5aeeca3ad37bf2aa006139b935f0a"],["js/konami.js","8eabb62206bdbf72bc5908e99de7e8a1"],["js/offline.js","5f4a715b028bcca5ce31de755936cca4"],["js/swiper.min.js","cabdd76e521b31cec9589102858f42e3"],["offline.html","f7bfe93e45645455dc91fd851f609aca"],["pwabuilder-sw.js","029bf713478b6c7e5113870dfef91a44"],["service-worker.js","2d56fe5cc9ff778acea633cf5ec0c2ce"],["service-worker/precache-manifest.cfe0ac6f6b3fae1ed489c31a680b44a7.js","cfe0ac6f6b3fae1ed489c31a680b44a7"],["serviceworker.js","9e55d2c7a6a13f5bfce2aeeaff89c233"],["svg/403.svg","93d6475bd2581cb5aa1b527aa8152a95"],["svg/404.svg","ea2bc467605d3d3aa715c6a3655a4e42"],["svg/500.svg","f56a358742db1d15fc06934278e59703"],["svg/503.svg","bb681f2ad0a2a75161eea851ff83b4e2"],["sw-offline.js","df2be0cbcb05306aff796c82e12299b7"],["sw.js","97172e501128820dac66b95516f5eec1"]];
var cacheName = 'sw-precache-v3-able-pwa-' + (self.registration ? self.registration.scope : '');


var ignoreUrlParametersMatching = [/^utm_/];



var addDirectoryIndex = function(originalUrl, index) {
    var url = new URL(originalUrl);
    if (url.pathname.slice(-1) === '/') {
      url.pathname += index;
    }
    return url.toString();
  };

var cleanResponse = function(originalResponse) {
    // If this is not a redirected response, then we don't have to do anything.
    if (!originalResponse.redirected) {
      return Promise.resolve(originalResponse);
    }

    // Firefox 50 and below doesn't support the Response.body stream, so we may
    // need to read the entire body to memory as a Blob.
    var bodyPromise = 'body' in originalResponse ?
      Promise.resolve(originalResponse.body) :
      originalResponse.blob();

    return bodyPromise.then(function(body) {
      // new Response() is happy when passed either a stream or a Blob.
      return new Response(body, {
        headers: originalResponse.headers,
        status: originalResponse.status,
        statusText: originalResponse.statusText
      });
    });
  };

var createCacheKey = function(originalUrl, paramName, paramValue,
                           dontCacheBustUrlsMatching) {
    // Create a new URL object to avoid modifying originalUrl.
    var url = new URL(originalUrl);

    // If dontCacheBustUrlsMatching is not set, or if we don't have a match,
    // then add in the extra cache-busting URL parameter.
    if (!dontCacheBustUrlsMatching ||
        !(url.pathname.match(dontCacheBustUrlsMatching))) {
      url.search += (url.search ? '&' : '') +
        encodeURIComponent(paramName) + '=' + encodeURIComponent(paramValue);
    }

    return url.toString();
  };

var isPathWhitelisted = function(whitelist, absoluteUrlString) {
    // If the whitelist is empty, then consider all URLs to be whitelisted.
    if (whitelist.length === 0) {
      return true;
    }

    // Otherwise compare each path regex to the path of the URL passed in.
    var path = (new URL(absoluteUrlString)).pathname;
    return whitelist.some(function(whitelistedPathRegex) {
      return path.match(whitelistedPathRegex);
    });
  };

var stripIgnoredUrlParameters = function(originalUrl,
    ignoreUrlParametersMatching) {
    var url = new URL(originalUrl);
    // Remove the hash; see https://github.com/GoogleChrome/sw-precache/issues/290
    url.hash = '';

    url.search = url.search.slice(1) // Exclude initial '?'
      .split('&') // Split into an array of 'key=value' strings
      .map(function(kv) {
        return kv.split('='); // Split each 'key=value' string into a [key, value] array
      })
      .filter(function(kv) {
        return ignoreUrlParametersMatching.every(function(ignoredRegex) {
          return !ignoredRegex.test(kv[0]); // Return true iff the key doesn't match any of the regexes.
        });
      })
      .map(function(kv) {
        return kv.join('='); // Join each [key, value] array into a 'key=value' string
      })
      .join('&'); // Join the array of 'key=value' strings into a string with '&' in between each

    return url.toString();
  };


var hashParamName = '_sw-precache';
var urlsToCacheKeys = new Map(
  precacheConfig.map(function(item) {
    var relativeUrl = item[0];
    var hash = item[1];
    var absoluteUrl = new URL(relativeUrl, self.location);
    var cacheKey = createCacheKey(absoluteUrl, hashParamName, hash, false);
    return [absoluteUrl.toString(), cacheKey];
  })
);

function setOfCachedUrls(cache) {
  return cache.keys().then(function(requests) {
    return requests.map(function(request) {
      return request.url;
    });
  }).then(function(urls) {
    return new Set(urls);
  });
}

self.addEventListener('install', function(event) {
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return setOfCachedUrls(cache).then(function(cachedUrls) {
        return Promise.all(
          Array.from(urlsToCacheKeys.values()).map(function(cacheKey) {
            // If we don't have a key matching url in the cache already, add it.
            if (!cachedUrls.has(cacheKey)) {
              var request = new Request(cacheKey, {credentials: 'same-origin'});
              return fetch(request).then(function(response) {
                // Bail out of installation unless we get back a 200 OK for
                // every request.
                if (!response.ok) {
                  throw new Error('Request for ' + cacheKey + ' returned a ' +
                    'response with status ' + response.status);
                }

                return cleanResponse(response).then(function(responseToCache) {
                  return cache.put(cacheKey, responseToCache);
                });
              });
            }
          })
        );
      });
    }).then(function() {
      
      // Force the SW to transition from installing -> active state
      return self.skipWaiting();
      
    })
  );
});

self.addEventListener('activate', function(event) {
  var setOfExpectedUrls = new Set(urlsToCacheKeys.values());

  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      return cache.keys().then(function(existingRequests) {
        return Promise.all(
          existingRequests.map(function(existingRequest) {
            if (!setOfExpectedUrls.has(existingRequest.url)) {
              return cache.delete(existingRequest);
            }
          })
        );
      });
    }).then(function() {
      
      return self.clients.claim();
      
    })
  );
});


self.addEventListener('fetch', function(event) {
  if (event.request.method === 'GET') {
    // Should we call event.respondWith() inside this fetch event handler?
    // This needs to be determined synchronously, which will give other fetch
    // handlers a chance to handle the request if need be.
    var shouldRespond;

    // First, remove all the ignored parameters and hash fragment, and see if we
    // have that URL in our cache. If so, great! shouldRespond will be true.
    var url = stripIgnoredUrlParameters(event.request.url, ignoreUrlParametersMatching);
    shouldRespond = urlsToCacheKeys.has(url);

    // If shouldRespond is false, check again, this time with 'index.html'
    // (or whatever the directoryIndex option is set to) at the end.
    var directoryIndex = 'index.html';
    if (!shouldRespond && directoryIndex) {
      url = addDirectoryIndex(url, directoryIndex);
      shouldRespond = urlsToCacheKeys.has(url);
    }

    // If shouldRespond is still false, check to see if this is a navigation
    // request, and if so, whether the URL matches navigateFallbackWhitelist.
    var navigateFallback = '/';
    if (!shouldRespond &&
        navigateFallback &&
        (event.request.mode === 'navigate') &&
        isPathWhitelisted([], event.request.url)) {
      url = new URL(navigateFallback, self.location).toString();
      shouldRespond = urlsToCacheKeys.has(url);
    }

    // If shouldRespond was set to true at any point, then call
    // event.respondWith(), using the appropriate cache key.
    if (shouldRespond) {
      event.respondWith(
        caches.open(cacheName).then(function(cache) {
          return cache.match(urlsToCacheKeys.get(url)).then(function(response) {
            if (response) {
              return response;
            }
            throw Error('The cached response that was expected is missing.');
          });
        }).catch(function(e) {
          // Fall back to just fetch()ing the request if some unexpected error
          // prevented the cached response from being valid.
          console.warn('Couldn\'t serve response for "%s" from cache: %O', event.request.url, e);
          return fetch(event.request);
        })
      );
    }
  }
});


// *** Start of auto-included sw-toolbox code. ***
/* 
 Copyright 2016 Google Inc. All Rights Reserved.

 Licensed under the Apache License, Version 2.0 (the "License");
 you may not use this file except in compliance with the License.
 You may obtain a copy of the License at

     http://www.apache.org/licenses/LICENSE-2.0

 Unless required by applicable law or agreed to in writing, software
 distributed under the License is distributed on an "AS IS" BASIS,
 WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 See the License for the specific language governing permissions and
 limitations under the License.
*/!function(e){if("object"==typeof exports&&"undefined"!=typeof module)module.exports=e();else if("function"==typeof define&&define.amd)define([],e);else{var t;t="undefined"!=typeof window?window:"undefined"!=typeof global?global:"undefined"!=typeof self?self:this,t.toolbox=e()}}(function(){return function e(t,n,r){function o(c,s){if(!n[c]){if(!t[c]){var a="function"==typeof require&&require;if(!s&&a)return a(c,!0);if(i)return i(c,!0);var u=new Error("Cannot find module '"+c+"'");throw u.code="MODULE_NOT_FOUND",u}var f=n[c]={exports:{}};t[c][0].call(f.exports,function(e){var n=t[c][1][e];return o(n?n:e)},f,f.exports,e,t,n,r)}return n[c].exports}for(var i="function"==typeof require&&require,c=0;c<r.length;c++)o(r[c]);return o}({1:[function(e,t,n){"use strict";function r(e,t){t=t||{};var n=t.debug||m.debug;n&&console.log("[sw-toolbox] "+e)}function o(e){var t;return e&&e.cache&&(t=e.cache.name),t=t||m.cache.name,caches.open(t)}function i(e,t){t=t||{};var n=t.successResponses||m.successResponses;return fetch(e.clone()).then(function(r){return"GET"===e.method&&n.test(r.status)&&o(t).then(function(n){n.put(e,r).then(function(){var r=t.cache||m.cache;(r.maxEntries||r.maxAgeSeconds)&&r.name&&c(e,n,r)})}),r.clone()})}function c(e,t,n){var r=s.bind(null,e,t,n);d=d?d.then(r):r()}function s(e,t,n){var o=e.url,i=n.maxAgeSeconds,c=n.maxEntries,s=n.name,a=Date.now();return r("Updating LRU order for "+o+". Max entries is "+c+", max age is "+i),g.getDb(s).then(function(e){return g.setTimestampForUrl(e,o,a)}).then(function(e){return g.expireEntries(e,c,i,a)}).then(function(e){r("Successfully updated IDB.");var n=e.map(function(e){return t.delete(e)});return Promise.all(n).then(function(){r("Done with cache cleanup.")})}).catch(function(e){r(e)})}function a(e,t,n){return r("Renaming cache: ["+e+"] to ["+t+"]",n),caches.delete(t).then(function(){return Promise.all([caches.open(e),caches.open(t)]).then(function(t){var n=t[0],r=t[1];return n.keys().then(function(e){return Promise.all(e.map(function(e){return n.match(e).then(function(t){return r.put(e,t)})}))}).then(function(){return caches.delete(e)})})})}function u(e,t){return o(t).then(function(t){return t.add(e)})}function f(e,t){return o(t).then(function(t){return t.delete(e)})}function h(e){e instanceof Promise||p(e),m.preCacheItems=m.preCacheItems.concat(e)}function p(e){var t=Array.isArray(e);if(t&&e.forEach(function(e){"string"==typeof e||e instanceof Request||(t=!1)}),!t)throw new TypeError("The precache method expects either an array of strings and/or Requests or a Promise that resolves to an array of strings and/or Requests.");return e}function l(e,t,n){if(!e)return!1;if(t){var r=e.headers.get("date");if(r){var o=new Date(r);if(o.getTime()+1e3*t<n)return!1}}return!0}var d,m=e("./options"),g=e("./idb-cache-expiration");t.exports={debug:r,fetchAndCache:i,openCache:o,renameCache:a,cache:u,uncache:f,precache:h,validatePrecacheInput:p,isResponseFresh:l}},{"./idb-cache-expiration":2,"./options":4}],2:[function(e,t,n){"use strict";function r(e){return new Promise(function(t,n){var r=indexedDB.open(u+e,f);r.onupgradeneeded=function(){var e=r.result.createObjectStore(h,{keyPath:p});e.createIndex(l,l,{unique:!1})},r.onsuccess=function(){t(r.result)},r.onerror=function(){n(r.error)}})}function o(e){return e in d||(d[e]=r(e)),d[e]}function i(e,t,n){return new Promise(function(r,o){var i=e.transaction(h,"readwrite"),c=i.objectStore(h);c.put({url:t,timestamp:n}),i.oncomplete=function(){r(e)},i.onabort=function(){o(i.error)}})}function c(e,t,n){return t?new Promise(function(r,o){var i=1e3*t,c=[],s=e.transaction(h,"readwrite"),a=s.objectStore(h),u=a.index(l);u.openCursor().onsuccess=function(e){var t=e.target.result;if(t&&n-i>t.value[l]){var r=t.value[p];c.push(r),a.delete(r),t.continue()}},s.oncomplete=function(){r(c)},s.onabort=o}):Promise.resolve([])}function s(e,t){return t?new Promise(function(n,r){var o=[],i=e.transaction(h,"readwrite"),c=i.objectStore(h),s=c.index(l),a=s.count();s.count().onsuccess=function(){var e=a.result;e>t&&(s.openCursor().onsuccess=function(n){var r=n.target.result;if(r){var i=r.value[p];o.push(i),c.delete(i),e-o.length>t&&r.continue()}})},i.oncomplete=function(){n(o)},i.onabort=r}):Promise.resolve([])}function a(e,t,n,r){return c(e,n,r).then(function(n){return s(e,t).then(function(e){return n.concat(e)})})}var u="sw-toolbox-",f=1,h="store",p="url",l="timestamp",d={};t.exports={getDb:o,setTimestampForUrl:i,expireEntries:a}},{}],3:[function(e,t,n){"use strict";function r(e){var t=a.match(e.request);t?e.respondWith(t(e.request)):a.default&&"GET"===e.request.method&&0===e.request.url.indexOf("http")&&e.respondWith(a.default(e.request))}function o(e){s.debug("activate event fired");var t=u.cache.name+"$$$inactive$$$";e.waitUntil(s.renameCache(t,u.cache.name))}function i(e){return e.reduce(function(e,t){return e.concat(t)},[])}function c(e){var t=u.cache.name+"$$$inactive$$$";s.debug("install event fired"),s.debug("creating cache ["+t+"]"),e.waitUntil(s.openCache({cache:{name:t}}).then(function(e){return Promise.all(u.preCacheItems).then(i).then(s.validatePrecacheInput).then(function(t){return s.debug("preCache list: "+(t.join(", ")||"(none)")),e.addAll(t)})}))}e("serviceworker-cache-polyfill");var s=e("./helpers"),a=e("./router"),u=e("./options");t.exports={fetchListener:r,activateListener:o,installListener:c}},{"./helpers":1,"./options":4,"./router":6,"serviceworker-cache-polyfill":16}],4:[function(e,t,n){"use strict";var r;r=self.registration?self.registration.scope:self.scope||new URL("./",self.location).href,t.exports={cache:{name:"$$$toolbox-cache$$$"+r+"$$$",maxAgeSeconds:null,maxEntries:null},debug:!1,networkTimeoutSeconds:null,preCacheItems:[],successResponses:/^0|([123]\d\d)|(40[14567])|410$/}},{}],5:[function(e,t,n){"use strict";var r=new URL("./",self.location),o=r.pathname,i=e("path-to-regexp"),c=function(e,t,n,r){t instanceof RegExp?this.fullUrlRegExp=t:(0!==t.indexOf("/")&&(t=o+t),this.keys=[],this.regexp=i(t,this.keys)),this.method=e,this.options=r,this.handler=n};c.prototype.makeHandler=function(e){var t;if(this.regexp){var n=this.regexp.exec(e);t={},this.keys.forEach(function(e,r){t[e.name]=n[r+1]})}return function(e){return this.handler(e,t,this.options)}.bind(this)},t.exports=c},{"path-to-regexp":15}],6:[function(e,t,n){"use strict";function r(e){return e.replace(/[-\/\\^$*+?.()|[\]{}]/g,"\\$&")}var o=e("./route"),i=e("./helpers"),c=function(e,t){for(var n=e.entries(),r=n.next(),o=[];!r.done;){var i=new RegExp(r.value[0]);i.test(t)&&o.push(r.value[1]),r=n.next()}return o},s=function(){this.routes=new Map,this.routes.set(RegExp,new Map),this.default=null};["get","post","put","delete","head","any"].forEach(function(e){s.prototype[e]=function(t,n,r){return this.add(e,t,n,r)}}),s.prototype.add=function(e,t,n,c){c=c||{};var s;t instanceof RegExp?s=RegExp:(s=c.origin||self.location.origin,s=s instanceof RegExp?s.source:r(s)),e=e.toLowerCase();var a=new o(e,t,n,c);this.routes.has(s)||this.routes.set(s,new Map);var u=this.routes.get(s);u.has(e)||u.set(e,new Map);var f=u.get(e),h=a.regexp||a.fullUrlRegExp;f.has(h.source)&&i.debug('"'+t+'" resolves to same regex as existing route.'),f.set(h.source,a)},s.prototype.matchMethod=function(e,t){var n=new URL(t),r=n.origin,o=n.pathname;return this._match(e,c(this.routes,r),o)||this._match(e,[this.routes.get(RegExp)],t)},s.prototype._match=function(e,t,n){if(0===t.length)return null;for(var r=0;r<t.length;r++){var o=t[r],i=o&&o.get(e.toLowerCase());if(i){var s=c(i,n);if(s.length>0)return s[0].makeHandler(n)}}return null},s.prototype.match=function(e){return this.matchMethod(e.method,e.url)||this.matchMethod("any",e.url)},t.exports=new s},{"./helpers":1,"./route":5}],7:[function(e,t,n){"use strict";function r(e,t,n){return n=n||{},i.debug("Strategy: cache first ["+e.url+"]",n),i.openCache(n).then(function(t){return t.match(e).then(function(t){var r=n.cache||o.cache,c=Date.now();return i.isResponseFresh(t,r.maxAgeSeconds,c)?t:i.fetchAndCache(e,n)})})}var o=e("../options"),i=e("../helpers");t.exports=r},{"../helpers":1,"../options":4}],8:[function(e,t,n){"use strict";function r(e,t,n){return n=n||{},i.debug("Strategy: cache only ["+e.url+"]",n),i.openCache(n).then(function(t){return t.match(e).then(function(e){var t=n.cache||o.cache,r=Date.now();if(i.isResponseFresh(e,t.maxAgeSeconds,r))return e})})}var o=e("../options"),i=e("../helpers");t.exports=r},{"../helpers":1,"../options":4}],9:[function(e,t,n){"use strict";function r(e,t,n){return o.debug("Strategy: fastest ["+e.url+"]",n),new Promise(function(r,c){var s=!1,a=[],u=function(e){a.push(e.toString()),s?c(new Error('Both cache and network failed: "'+a.join('", "')+'"')):s=!0},f=function(e){e instanceof Response?r(e):u("No result returned")};o.fetchAndCache(e.clone(),n).then(f,u),i(e,t,n).then(f,u)})}var o=e("../helpers"),i=e("./cacheOnly");t.exports=r},{"../helpers":1,"./cacheOnly":8}],10:[function(e,t,n){t.exports={networkOnly:e("./networkOnly"),networkFirst:e("./networkFirst"),cacheOnly:e("./cacheOnly"),cacheFirst:e("./cacheFirst"),fastest:e("./fastest")}},{"./cacheFirst":7,"./cacheOnly":8,"./fastest":9,"./networkFirst":11,"./networkOnly":12}],11:[function(e,t,n){"use strict";function r(e,t,n){n=n||{};var r=n.successResponses||o.successResponses,c=n.networkTimeoutSeconds||o.networkTimeoutSeconds;return i.debug("Strategy: network first ["+e.url+"]",n),i.openCache(n).then(function(t){var s,a,u=[];if(c){var f=new Promise(function(r){s=setTimeout(function(){t.match(e).then(function(e){var t=n.cache||o.cache,c=Date.now(),s=t.maxAgeSeconds;i.isResponseFresh(e,s,c)&&r(e)})},1e3*c)});u.push(f)}var h=i.fetchAndCache(e,n).then(function(e){if(s&&clearTimeout(s),r.test(e.status))return e;throw i.debug("Response was an HTTP error: "+e.statusText,n),a=e,new Error("Bad response")}).catch(function(r){return i.debug("Network or response error, fallback to cache ["+e.url+"]",n),t.match(e).then(function(e){if(e)return e;if(a)return a;throw r})});return u.push(h),Promise.race(u)})}var o=e("../options"),i=e("../helpers");t.exports=r},{"../helpers":1,"../options":4}],12:[function(e,t,n){"use strict";function r(e,t,n){return o.debug("Strategy: network only ["+e.url+"]",n),fetch(e)}var o=e("../helpers");t.exports=r},{"../helpers":1}],13:[function(e,t,n){"use strict";var r=e("./options"),o=e("./router"),i=e("./helpers"),c=e("./strategies"),s=e("./listeners");i.debug("Service Worker Toolbox is loading"),self.addEventListener("install",s.installListener),self.addEventListener("activate",s.activateListener),self.addEventListener("fetch",s.fetchListener),t.exports={networkOnly:c.networkOnly,networkFirst:c.networkFirst,cacheOnly:c.cacheOnly,cacheFirst:c.cacheFirst,fastest:c.fastest,router:o,options:r,cache:i.cache,uncache:i.uncache,precache:i.precache}},{"./helpers":1,"./listeners":3,"./options":4,"./router":6,"./strategies":10}],14:[function(e,t,n){t.exports=Array.isArray||function(e){return"[object Array]"==Object.prototype.toString.call(e)}},{}],15:[function(e,t,n){function r(e,t){for(var n,r=[],o=0,i=0,c="",s=t&&t.delimiter||"/";null!=(n=x.exec(e));){var f=n[0],h=n[1],p=n.index;if(c+=e.slice(i,p),i=p+f.length,h)c+=h[1];else{var l=e[i],d=n[2],m=n[3],g=n[4],v=n[5],w=n[6],y=n[7];c&&(r.push(c),c="");var b=null!=d&&null!=l&&l!==d,E="+"===w||"*"===w,R="?"===w||"*"===w,k=n[2]||s,$=g||v;r.push({name:m||o++,prefix:d||"",delimiter:k,optional:R,repeat:E,partial:b,asterisk:!!y,pattern:$?u($):y?".*":"[^"+a(k)+"]+?"})}}return i<e.length&&(c+=e.substr(i)),c&&r.push(c),r}function o(e,t){return s(r(e,t))}function i(e){return encodeURI(e).replace(/[\/?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function c(e){return encodeURI(e).replace(/[?#]/g,function(e){return"%"+e.charCodeAt(0).toString(16).toUpperCase()})}function s(e){for(var t=new Array(e.length),n=0;n<e.length;n++)"object"==typeof e[n]&&(t[n]=new RegExp("^(?:"+e[n].pattern+")$"));return function(n,r){for(var o="",s=n||{},a=r||{},u=a.pretty?i:encodeURIComponent,f=0;f<e.length;f++){var h=e[f];if("string"!=typeof h){var p,l=s[h.name];if(null==l){if(h.optional){h.partial&&(o+=h.prefix);continue}throw new TypeError('Expected "'+h.name+'" to be defined')}if(v(l)){if(!h.repeat)throw new TypeError('Expected "'+h.name+'" to not repeat, but received `'+JSON.stringify(l)+"`");if(0===l.length){if(h.optional)continue;throw new TypeError('Expected "'+h.name+'" to not be empty')}for(var d=0;d<l.length;d++){if(p=u(l[d]),!t[f].test(p))throw new TypeError('Expected all "'+h.name+'" to match "'+h.pattern+'", but received `'+JSON.stringify(p)+"`");o+=(0===d?h.prefix:h.delimiter)+p}}else{if(p=h.asterisk?c(l):u(l),!t[f].test(p))throw new TypeError('Expected "'+h.name+'" to match "'+h.pattern+'", but received "'+p+'"');o+=h.prefix+p}}else o+=h}return o}}function a(e){return e.replace(/([.+*?=^!:${}()[\]|\/\\])/g,"\\$1")}function u(e){return e.replace(/([=!:$\/()])/g,"\\$1")}function f(e,t){return e.keys=t,e}function h(e){return e.sensitive?"":"i"}function p(e,t){var n=e.source.match(/\((?!\?)/g);if(n)for(var r=0;r<n.length;r++)t.push({name:r,prefix:null,delimiter:null,optional:!1,repeat:!1,partial:!1,asterisk:!1,pattern:null});return f(e,t)}function l(e,t,n){for(var r=[],o=0;o<e.length;o++)r.push(g(e[o],t,n).source);var i=new RegExp("(?:"+r.join("|")+")",h(n));return f(i,t)}function d(e,t,n){return m(r(e,n),t,n)}function m(e,t,n){v(t)||(n=t||n,t=[]),n=n||{};for(var r=n.strict,o=n.end!==!1,i="",c=0;c<e.length;c++){var s=e[c];if("string"==typeof s)i+=a(s);else{var u=a(s.prefix),p="(?:"+s.pattern+")";t.push(s),s.repeat&&(p+="(?:"+u+p+")*"),p=s.optional?s.partial?u+"("+p+")?":"(?:"+u+"("+p+"))?":u+"("+p+")",i+=p}}var l=a(n.delimiter||"/"),d=i.slice(-l.length)===l;return r||(i=(d?i.slice(0,-l.length):i)+"(?:"+l+"(?=$))?"),i+=o?"$":r&&d?"":"(?="+l+"|$)",f(new RegExp("^"+i,h(n)),t)}function g(e,t,n){return v(t)||(n=t||n,t=[]),n=n||{},e instanceof RegExp?p(e,t):v(e)?l(e,t,n):d(e,t,n)}var v=e("isarray");t.exports=g,t.exports.parse=r,t.exports.compile=o,t.exports.tokensToFunction=s,t.exports.tokensToRegExp=m;var x=new RegExp(["(\\\\.)","([\\/.])?(?:(?:\\:(\\w+)(?:\\(((?:\\\\.|[^\\\\()])+)\\))?|\\(((?:\\\\.|[^\\\\()])+)\\))([+*?])?|(\\*))"].join("|"),"g")},{isarray:14}],16:[function(e,t,n){!function(){var e=Cache.prototype.addAll,t=navigator.userAgent.match(/(Firefox|Chrome)\/(\d+\.)/);if(t)var n=t[1],r=parseInt(t[2]);e&&(!t||"Firefox"===n&&r>=46||"Chrome"===n&&r>=50)||(Cache.prototype.addAll=function(e){function t(e){this.name="NetworkError",this.code=19,this.message=e}var n=this;return t.prototype=Object.create(Error.prototype),Promise.resolve().then(function(){if(arguments.length<1)throw new TypeError;return e=e.map(function(e){return e instanceof Request?e:String(e)}),Promise.all(e.map(function(e){"string"==typeof e&&(e=new Request(e));var n=new URL(e.url).protocol;if("http:"!==n&&"https:"!==n)throw new t("Invalid scheme");return fetch(e.clone())}))}).then(function(r){if(r.some(function(e){return!e.ok}))throw new t("Incorrect response status");return Promise.all(r.map(function(t,r){return n.put(e[r],t)}))}).then(function(){})},Cache.prototype.add=function(e){return this.addAll([e])})}()},{}]},{},[13])(13)});


// *** End of auto-included sw-toolbox code. ***



// Runtime cache configuration, using the sw-toolbox library.

toolbox.router.get(/^https:\/\/fonts\.googleapis\.com\//, toolbox.cacheFirst, {});
toolbox.router.get(/^https:\/\/www\.thecocktaildb\.com\/images\/media\/drink\/(\w+)\.jpg/, toolbox.cacheFirst, {});




importScripts("/js/offline.js");

