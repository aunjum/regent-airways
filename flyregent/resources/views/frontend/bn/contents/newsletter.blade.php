@extends('frontend.bn.layout.master-layout')
@section('content')
<!--=========================================Slider======================================================-->

@include('frontend/bn/layout/content-slider')

<!--=========================================Main Body====================================================-->
<div class="BG-map">
    <div class="BG-map-inner">
        <div class="clearfix"></div>

        <section id="intro-wrapper" class="mb0">
            <div class="intro-inner-wrapper container">

                <div class="tab_container min_height">
                    @if (Session::has('message'))
                        <div class="alert alert-{{ Session::get('message_type') }}">{{ Session::get('message') }}</div>
                    @endif
                    
                    <form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ URL::to('/') }}/newsletter-submit">


                        <div class="title"><b>{{$title}}</b></div>
                        <br/>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Title<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <select class="form-control" name="title">
                                    <option>Mr.</option>
                                    <option>Ms.</option>
                                    <option>Mrs.</option>
                                    <option>Brig. General</option>
                                    <option>Brigadier</option>
                                    <option>Col.</option>
                                    <option>Dr.</option>
                                    <option>Excellency</option>
                                    <option>Hon.</option>
                                    <option>Jr.</option>
                                    <option>Prof.</option>
                                    <option>Rev.</option>
                                    <option>Senator</option>
                                    <option>Sir</option>
                                    <option>Snr.</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">First Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Last Name<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Gender<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="radio" name="gender" value="Male"> Male
                                <input type="radio" name="gender" value="Female"> Female

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="email" class="form-control" name="email" placeholder="Email" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Contact No<span class="required">*</span></label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="phone" placeholder="Contact No">
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-4">
                                <select name="country" id="country">
                                    <option value="">Select Country</option>       
                                    <option value="1050">Aland Islands</option>
                                    <option value="1051">Albania</option>
                                    <option value="1052">Alderney</option>
                                    <option value="1053">Algeria</option>
                                    <option value="1054">American Samoa</option>
                                    <option value="1055">Andorra</option>
                                    <option value="1056">Angola</option>
                                    <option value="1057">Anguilla</option>
                                    <option value="1058">Antarctica</option>
                                    <option value="1059">Antigua and Barbuda</option>
                                    <option value="1060">Argentina</option>
                                    <option value="1061">Armenia</option>
                                    <option value="1062">Aruba</option>
                                    <option value="1064">Australia</option>
                                    <option value="1065">Austria</option>
                                    <option value="1066">Azerbaijan</option>
                                    <option value="1069">Bahamas</option>
                                    <option value="1070">Bahrain</option>
                                    <option value="1071">Bangladesh</option>
                                    <option value="1072">Barbados</option>
                                    <option value="1073">Belarus</option>
                                    <option value="1074">Belgium</option>
                                    <option value="1075">Belize</option>
                                    <option value="1076">Benin</option>
                                    <option value="1077">Bermuda</option>
                                    <option value="1078">Bhutan</option>
                                    <option value="1079">Bolivia</option>
                                    <option value="1080">Bosnia and Herzegovina</option>
                                    <option value="1081">Botswana</option>
                                    <option value="1082">Bouvet Island</option>
                                    <option value="1083">Brazil</option>
                                    <option value="1084">British Indian Ocean Territory</option>
                                    <option value="1085">Brunei Darussalam</option>
                                    <option value="1086">Bulgaria</option>
                                    <option value="1087">Burkina Faso</option>
                                    <option value="1088">Burundi</option>
                                    <option value="1089">Cambodia</option>
                                    <option value="1090">Cameroon</option>
                                    <option value="1091">Canada</option>
                                    <option value="1092">Cape Verde</option>
                                    <option value="1093">Cayman Islands</option>
                                    <option value="1094">Central African Republic</option>
                                    <option value="1095">Chad (Tchad)</option>
                                    <option value="1098">Chile</option>
                                    <option value="1099">China</option>
                                    <option value="1100">Christmas Island</option>
                                    <option value="1101">Cocos (Keeling) Islands</option>
                                    <option value="1102">Colombia</option>
                                    <option value="1103">Comoros</option>
                                    <option value="1104">Congo, Republic </option>
                                    <option value="1105">Cook Islands</option>
                                    <option value="1106">Costa Rica</option>
                                    <option value="1108">Croatia (Hrvatska)</option>
                                    <option value="1109">Cuba</option>
                                    <option value="1110">Cyprus</option>
                                    <option value="1111">Czech Republic</option>
                                    <option value="1107">CÃ´te D''ivoire (Ivory Coast)</option>
                                    <option value="1112">Denmark</option>
                                    <option value="1113">Djibouti</option>
                                    <option value="1114">Dominica</option>
                                    <option value="1115">Dominican Republic</option>
                                    <option value="1116">Ecuador</option>
                                    <option value="1117">Egypt</option>
                                    <option value="1118">El Salvador</option>
                                    <option value="1119">Equatorial Guinea</option>
                                    <option value="1120">Eritrea</option>
                                    <option value="1121">Estonia</option>
                                    <option value="1122">Ethiopia</option>
                                    <option value="1123">Faeroe Islands</option>
                                    <option value="1124">Falkland Islands (Malvinas)</option>
                                    <option value="1125">Fiji</option>
                                    <option value="1126">Finland</option>
                                    <option value="1127">France</option>
                                    <option value="1128">French Guiana</option>
                                    <option value="1129">French Polynesia</option>
                                    <option value="1130">French Southern Territories</option>
                                    <option value="1131">Gabon</option>
                                    <option value="1132">Gambia</option>
                                    <option value="1133">Georgia</option>
                                    <option value="1134">Germany </option>
                                    <option value="1135">Ghana</option>
                                    <option value="1136">Gibraltar</option>
                                    <option value="1137">Great Britain</option>
                                    <option value="1138">Greece</option>
                                    <option value="1139">Greenland</option>
                                    <option value="1140">Grenada</option>
                                    <option value="1141">Guadeloupe</option>
                                    <option value="1142">Guam</option>
                                    <option value="1143">Guatemala</option>
                                    <option value="1144">Guernsey</option>
                                    <option value="1145">Guinea</option>
                                    <option value="1146">Guinea-Bissau</option>
                                    <option value="1147">Guyana</option>
                                    <option value="1148">Haiti</option>
                                    <option value="1149">Heard Island and Mcdonald Islands</option>
                                    <option value="1150">Honduras</option>
                                    <option value="1151">Hong Kong</option>
                                    <option value="1152">Hungary</option>
                                    <option value="1153">Iceland</option>
                                    <option value="1154">India</option>
                                    <option value="1155">Indonesia</option>
                                    <option value="1156">Iran</option>
                                    <option value="1157">Iraq</option>
                                    <option value="1158">Ireland</option>
                                    <option value="1160">Israel</option>
                                    <option value="1161">Italy</option>
                                    <option value="1162">Jamaica</option>
                                    <option value="1163">Japan</option>
                                    <option value="1164">Jersey</option>
                                    <option value="1165">Jordan</option>
                                    <option value="1166">Kazakhstan</option>
                                    <option value="1167">Kenya</option>
                                    <option value="1168">Kiribati</option>
                                    <option value="1169">Korea (North)</option>
                                    <option value="1170">Korea (South)</option>
                                    <option value="1171">Kuwait</option>
                                    <option value="1172">Kyrgyzstan</option>
                                    <option value="1173">Lao People''s Democratic Republic</option>
                                    <option value="1174">Latvia</option>
                                    <option value="1175">Lebanon</option>
                                    <option value="1176">Lesotho</option>
                                    <option value="1177">Liberia</option>
                                    <option value="1178">Libya</option>
                                    <option value="1179">Liechtenstein</option>
                                    <option value="1180">Lithuania</option>
                                    <option value="1181">Luxembourg</option>
                                    <option value="1182">Macao</option>
                                    <option value="1183">Macedonia</option>
                                    <option value="1184">Madagascar</option>
                                    <option value="1185">Malawi</option>
                                    <option value="1186">Malaysia</option>
                                    <option value="1187">Maldives</option>
                                    <option value="1188">Mali</option>
                                    <option value="1189">Malta</option>
                                    <option value="1190">Marshall Islands</option>
                                    <option value="1200">Martinique</option>
                                    <option value="1201">Mauritania</option>
                                    <option value="1202">Mauritius</option>
                                    <option value="1203">Mayotte</option>
                                    <option value="1204">Mexico</option>
                                    <option value="1205">Micronesia</option>
                                    <option value="1206">Moldova</option>
                                    <option value="1207">Monaco</option>
                                    <option value="1208">Mongolia</option>
                                    <option value="1209">Montenegro</option>
                                    <option value="1210">Montserrat</option>
                                    <option value="1211">Morocco</option>
                                    <option value="1212">Mozambique</option>
                                    <option value="1213">Myanmar</option>
                                    <option value="1214">Namibia</option>
                                    <option value="1215">Nauru</option>
                                    <option value="1216">Nepal</option>
                                    <option value="1217">Netherlands</option>
                                    <option value="1218">Netherlands Antilles</option>
                                    <option value="1219">New Caledonia</option>
                                    <option value="1220">New Zealand</option>
                                    <option value="1221">Nicaragua</option>
                                    <option value="1222">Niger</option>
                                    <option value="1223">Nigeria</option>
                                    <option value="1224">Niue</option>
                                    <option value="1225">Norfolk Island</option>
                                    <option value="1226">Northern Mariana Islands</option>
                                    <option value="1227">Norway</option>
                                    <option value="1228">Oman</option>
                                    <option value="1229">Pakistan</option>
                                    <option value="1230">Palau</option>
                                    <option value="1231">Palestinian Territories</option>
                                    <option value="1232">Panama</option>
                                    <option value="1233">Papua New Guinea</option>
                                    <option value="1234">Paraguay</option>
                                    <option value="1235">Peru</option>
                                    <option value="1236">Philippines</option>
                                    <option value="1237">Pitcairn</option>
                                    <option value="1238">Poland</option>
                                    <option value="1239">Portugal</option>
                                    <option value="1240">Puerto Rico</option>
                                    <option value="1241">Qatar</option>
                                    <option value="6050">Ratmalana</option>
                                    <option value="1243">Romania</option>
                                    <option value="1244">Russian Federation</option>
                                    <option value="1245">Rwanda</option>
                                    <option value="1242">RÃ©union</option>
                                    <option value="1246">Saint BarthÃ©lemy </option>
                                    <option value="1247">Saint Helena</option>
                                    <option value="1248">Saint Kitts And Nevis</option>
                                    <option value="1249">Saint Lucia</option>
                                    <option value="1250">Saint Martin </option>
                                    <option value="1251">Saint Pierre And Miquelon</option>
                                    <option value="1252">Saint Vincent And The Grenadines</option>
                                    <option value="1253">Samoa</option>
                                    <option value="1254">San Marino </option>
                                    <option value="1255">Sao Tome And Principe</option>
                                    <option value="1256">Saudi Arabia </option>
                                    <option value="1257">Senegal</option>
                                    <option value="1258">Serbia</option>
                                    <option value="4050">Serbia &amp; Montenegro</option>
                                    <option value="1259">Seychelles</option>
                                    <option value="1260">Sierra Leone</option>
                                    <option value="1261">Singapore</option>
                                    <option value="1262">Slovakia</option>
                                    <option value="1263">Slovenia</option>
                                    <option value="1264">Solomon Islands</option>
                                    <option value="1265">Somalia</option>
                                    <option value="1266">South Africa </option>
                                    <option value="1267">South Georgia </option>
                                    <option value="1268">Spain </option>
                                    <option value="1269">Sri Lanka</option>
                                    <option value="5052">St Lucia</option>
                                    <option value="1270">Sudan</option>
                                    <option value="4053">Sultanate of Oman</option>
                                    <option value="1271">Suriname</option>
                                    <option value="1272">Svalbard and Jan Mayen</option>
                                    <option value="1273">Swaziland</option>
                                    <option value="1274">Sweden</option>
                                    <option value="1275">Switzerland</option>
                                    <option value="5054">Syria</option>
                                    <option value="1276">Syrian Arab Republic</option>
                                    <option value="1277">Taiwan</option>
                                    <option value="1278">Tajikistan</option>
                                    <option value="1279">Tanzania</option>
                                    <option value="1280">Thailand</option>
                                    <option value="1281">Timor-Leste </option>
                                    <option value="1282">Togo</option>
                                    <option value="1283">Tokelau</option>
                                    <option value="1284">Tonga</option>
                                    <option value="1285">Trinidad And Tobago</option>
                                    <option value="1286">Tunisia</option>
                                    <option value="1287">Turkey</option>
                                    <option value="1288">Turkmenistan</option>
                                    <option value="1289">Turks And Caicos Islands</option>
                                    <option value="1290">Tuvalu</option>
                                    <option value="4054">UAE</option>
                                    <option value="1291">Uganda</option>
                                    <option value="3050">UK</option>
                                    <option value="1292">Ukraine</option>
                                    <option value="1293">United Arab Emirates</option>
                                    <option value="1297">United States</option>
                                    <option value="1299">United States Minor Outlying Islands</option>
                                    <option value="1300">Uruguay</option>
                                    <option value="4056">USA</option>
                                    <option value="1301">Uzbekistan</option>
                                    <option value="1302">Vanuatu</option>
                                    <option value="1303">Vatican City </option>
                                    <option value="1304">Venezuela</option>
                                    <option value="5100">Yugoaslavia</option>
                                    <option value="5101">Zimbabwe</option>
                                </select>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">&nbsp;</label>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>
                </div>



            </div>
        </section>



    </div>
</div>
<!--=========================================End Main Body================================================-->
@stop