<?php
ob_start();
session_start();
require "db_connection.php";
 
?>
  
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script type="text/javascript" src="script.js"></script>
        <script type="text/javascript">
        var states_arr = new Array("Andhra Pradesh" , "Arunachal Pradesh" , "Assam" , "Bihar" , "Chhattisgarh" , "Goa" , "Gujarat" , "Haryana" , "Himachal Pradesh" , "Jammu and Kashmir" , "Jharkhand" , "Karnataka" , "Kerala" , "Madhya Pradesh" , "Maharashtra" , "Manipur" , "Meghalaya" , "Mizoram" , "Nagaland" , "Orissa" , "Punjab" , "Rajasthan" , "Sikkim" , "Tamil Nadu" , "Telangana" , "Tripura" , "Uttar Pradesh" , "Uttaranchal" , "West Bengal" , "Andaman and Nicobar Islands" , "Chandigarh" , "Dadra and Nagar Haveli" , "Daman and Diu" , "Delhi" , "Lakshadweep" , "Pondicherry");
    
        var district_arr = new Array();
    
        district_arr[0] = "";
        district_arr[1] = "Anantapur|Chittoor|Cuddapah|East Godavari|Guntur|Krishna|Kurnool|Nellore|Prakasam|Srikakulam|Vishakapatnam|Vizianagaram|West Godavari";
        district_arr[2] = "Anjaw|Changlang|Dibang Valley|East Kameng|East Siang|Kra Daadi|Kurung Kumey|Lohit|Longding|Lower Dibang Valley|Lower Subansiri|Namsai|Papum Pare|Siang|Tawang|Tirap|Upper Siang|Upper Subansiri|West Kameng|West Siang";
        district_arr[3] = "Baksa|Barpeta|Bongaigaon|Cachar|Chirang|Darrang|Dhemaji|Dhubri|Dibrugarh|Dima Hasao|Goalpara|Golaghat|Hailakandi|Jorhat|Kamrup M|Kamrup R|Karbi Anglong|Karimganj|Kokrajhar|Lakhimpur|Marigaon|Nagaon|Nalbari|Sibsagar|Sonitpur|Tinsukia|Udalguri";
        district_arr[4] = "Araria|Arwal|Aurangabad|Banka|Begusarai|Bhagalpur|Bhojpur|Buxar|Darbhanga|East Champaran|Gaya|Gopalganj|Jamui|Jehanabad|Kaimur Bhabua|Katihar|Khagaria|Kishanganj|Lakhisarai|Madhepura|Madhubani|Munger|Muzaffarpur|Nalanda|Nawada|Patna|Purnia|Rohtas|Saharsa|Samastipur|Saran|Sheikhpura|Sheohar|Sitamarhi|Siwan|Supaul|Vaishali|West Champaran";
        district_arr[5] = "Balod|Baloda Bazar|Balrampur|Bastar|Bemetra|Bijapur|Bilaspur|Dantewada|Dhamtari|Durg|Gariyaband|Janjgir Champa|Jashpur|Kanker|Kawardha|Kondagaon|Korba|Koriya|Mahasamund|Mungeli|Narayanpur|Raigarh|Raipur|Rajnandgaon|Sukma|Surajpur|Surguja";
        district_arr[6] = "North Goa|South Goa";
        district_arr[7] = "Ahmedabad|Amreli|Anand|Aravalli|Banas Kantha|Bharuch|Bhavnagar|Botad|Chhotaudepur|Dahod|Devbhumi Dwarka|Gandhinagar|Gir Somnath|Jamnagar|Junagadh|Kachchh|Kheda|Mahesana|Mahisagar|Morbi|Narmada|Navsari|Panch Mahals|Patan|Porbandar|Rajkot|Sabar Kantha|Surat|Surendranagar|Tapi|The Dangs|Vadodara|Valsad";
        district_arr[8] = "Ambala|Bhiwani|Faridabad|Fatehabad|Gurgaon|Hisar|Jhajjar|Jind|Kaithal|Karnal|Kurukshetra|Mahendragarh|Mewat|Palwal|Panchkula|Panipat|Rewari|Rohtak|Sirsa|Sonipat|Yamunanagar";
        district_arr[9] = "Bilaspur|Chamba|Hamirpur|Kangra|Kinnaur|Kullu|Lahul Spiti|Mandi|Shimla|Sirmaur|Solan|Una";
        district_arr[10] = "Anantnag|Badgam|Bandipora|Baramula|Doda|Ganderbal|Jammu|Kargil|Kathua|Kishtwar|Kulgam|Kupwara|Leh Ladakh|Poonch|Pulwama|Rajouri|Ramban|Reasi|Samba|Shopian|Srinagar|Udhampur";
        district_arr[11] = "Bokaro|Chatra|Deoghar|Dhanbad|Dumka|Garhwa|Giridih|Godda|Gumla|Hazaribagh|Jamtara|Khunti|Kodarma|Latehar|Lohardaga|Pakaur|Palamu|Pashchimi Singhbhum|Purbi Singhbhum|Ramgarh|Ranchi|Sahibganj|Saraikela|Simdega";
        district_arr[12] = "Bagalkote|Bangalore Rural|Bangalore Urban|Belgaum|Bellary|Bidar|Bijapur|Chamrajnagar|Chikkaballapur|Chikmagalur|Chitradurga|Dakshina Kannada|Davanagere|Dharwad|Gadag|Gulbarga|Hassan|Haveri|Kodagu|Kolar|Koppal|Mandya|Mysore|Raichur|Ramanagar|Shimoga|Tumkur|Udupi|Uttara Kannada|Yadgir";
        district_arr[13] = "Alappuzha|Ernakulam|Idukki|Kannur|Kasaragod|Kollam|Kottayam|KOZHIKKODE|Malappuram|Palakkad|Pathanamthitta|Thiruvananthapuram|Thrissur|Wayanad";
        district_arr[14] = "Agar Malwa|Alirajpur|Anuppur|Ashok Nagar|Balaghat|Barwani|Betul|Bhind|Bhopal|Burhanpur|Chhatarpur|Chhindwada|Damoh|Datia|Dewas|Dhar|Dindori|Guna|Gwalior|Harda|Hoshangabad|Indore|Jabalpur|Jhabua|Katni|Khandwa|Khargone|Mandla|Mandsaur|Morena|Narsinghpur|Neemuch|Panna|Raisen|Rajgarh|Ratlam|Rewa|Sagar|Satna|Sehore|Seoni|Shahdol|Shajapur|Sheopur|Shivpuri|Sidhi|Singroli|Tikamgarh|Ujjain|Umaria|Vidisha";
        district_arr[15] = "Ahmednagar|Akola|Amravati|Aurangabad|Bhandara|Bid|Brihan Mumbai|Buldana|Chandrapur|Dhule|Gadchiroli|Gondiya|Hingoli|Jalgaon|Jalna|Kolhapur|Latur|Nagpur|Nanded|Nandurbar|Nashik|Osmanabad|Palghar|Parbhani|Pune|Raigarh|Ratnagiri|Sangli|Satara|Sindhudurg|Solapur|Thane|Wardha|Washim|Yavatmal";
        district_arr[16] = "Bishnupur|Chandel|Churachandpur|Imphal East|Imphal West|Senapati|Tamenglong|Thoubal|Ukhrul";
        district_arr[17] = "East Garo Hills|East Jaintia Hills|East Khasi Hills|North Garo Hills|Ri Bhoi|South Garo Hills|South West Garo Hills|South West Khasi Hills|West Garo Hills|West Jaintia Hills|West Khasi Hills";
        district_arr[18] = "Aizawl East|Aizawl West|Champhai|Kolasib|Lawngtlai|Lunglei|Mamit|Saiha|Serchhip";
        district_arr[19] = "Dimapur|Kiphire|Kohima|Longleng|Mokokchung|Mon|Peren|Phek|Tuensang|Wokha|Zunheboto";
        district_arr[20] = "Anugul|Balangir|Baleshwar|Bargarh|Baudh|Bhadrak|Cuttack|Deogarh|Dhenkanal|Gajapati|Ganjam|Jagatsinghpur|Jajapur|Jharsuguda|Kalahandi|Kandhamal|Kendrapara|Keonjhar|Khordha|Koraput|Malkangiri|Mayurbhanj|Nabarangapur|Nayagarh|Nuapada|Puri|Rayagada|Sambalpur|Sonapur|Sundargarh";
        district_arr[21] = "Amritsar|Barnala|Bathinda|Faridkot|Fatehgarh Sahib|Fazilka|Firozpur|Gurdaspur|Hoshiarpur|Jalandhar|Kapurthala|Ludhiana|Mansa|Moga|Mohali SAS Nagar|Muktsar|Nawanshahr|Pathankot|Patiala|Rupnagar|Sangrur|Tarn Taran";
        district_arr[22] = "Ajmer|Alwar|Banswara|Baran|Barmer|Bharatpur|Bhilwara|Bikaner|Bundi|Chittaurgarh|Churu|Dausa|Dhaulpur|Dungarpur|Ganganagar|Hanumangarh|Jaipur|Jaisalmer|Jalor|Jhalawar|Jhunjhunun|Jodhpur|Karauli|Kota|Nagaur|Pali|Pratapgarh|Rajsamand|Sawai Madhopur|Sikar|Sirohi|Tonk|Udaipur";
        district_arr[23] = "East|North|South|West";
        district_arr[24] = "Ariyalur|Chennai|Coimbatore|Cuddalore|Dharmapuri|Dindigul|Erode|Kancheepuram|Kanniyakumari|Karur|Krishnagiri|Madurai|Nagapattinam|Namakkal|Nilgiris|Perambalur|Pudukkottai|Ramanathapuram|Salem|Sivaganga|Thanjavur|Theni|Thiruvallur|Thiruvarur|Tiruchirappalli|Tirunelveli|Tirupur|Tiruvanamalai|Toothukudi|Vellore|Viluppuram|Virudhunagar";
        district_arr[25] = "Adilabad|Hyderabad|Karim Nagar|Khammam|Mahbubnagar|Medak|Nalgonda|Nizamabad|Ranga Reddy|Warangal Urban";
        district_arr[26] = "Dhalai|Gomati|Khowai|North Tripura|Sipahijala|South Tripura|Unakoti|West Tripura";
        district_arr[27] = "Agra|Aligarh|Allahabad|Ambedkar Nagar|Auraiya|Azamgarh|Bagpat|Bahraich|Ballia|Balrampur|Banda|Barabanki|Bareilly|Basti|Bijnor|Budaun|Bulandshahar|C S M Nagar|Chandauli|Chitrakoot|Deoria|Etah|Etawah|Faizabad|Farrukhabad|Fatehpur|Firozabad|Gautam Buddha Nagar|Ghaziabad|Ghazipur|Gonda|Gorakhpur|Hamirpur|Hapur|Hardoi|Hathras|Jalaun|Jaunpur|Jhansi|Jyotiba Phule Nagar|Kannauj|Kanpur Dehat|Kanpur Nagar|Kashi Ram Nagar|Kaushambi|Kushinagar|Lakhimpur Kheri|Lalitpur|Lucknow|Maharajganj|Mahoba|Mainpuri|Mathura|Maunathbhanjan|Meerut|Mirzapur|Moradabad|Muzaffarnagar|Pilibhit|Pratapgarh|Rae Bareli|Rampur|Saharanpur|Sambhal|Sant Kabir Nagar|Sant Ravidas Nagar|Shahjahanpur|Shamli|Shrawasti|Siddharth Nagar|Sitapur|Sonbhadra|Sultanpur|Unnav|Varanasi";
        district_arr[28] = "Almora|Bageshwar|Chamoli|Champawat|Dehradun|Garhwal|Hardwar|Nainital|Pithoragarh|Rudraprayag|Tehri Garhwal|Udham Singh Nagar|Uttarkashi";
        district_arr[29] = "Alipurduar|Bankura|Barddhaman|Birbhum|Dakshin Dinajpur|Darjiling|Haora|Hugli|Jalpaiguri|Koch Bihar|Maldah|Murshidabad|Nadia|North Twenty Four Parganas|Paschim Medinipur|Purba Medinipur|Puruliya|South Twenty Four Parganas|Uttar Dinajpur";
        district_arr[30] = "Nicobar|North and Middle Andaman|South Andaman";
        district_arr[31] = "Chandigarh";
        district_arr[32] = "Dadra and Nagar Haveli";
        district_arr[33] = "Daman|Diu";
        district_arr[34] = "Central|East|New Delhi|North|North East|North West|Shahdara|South|South East|South West|West";
        district_arr[35] = "Lakshadweep";
        district_arr[36] = "Karaikal|Mahe|Pondicherry|Yanam";
    
    
        function populateDistricts(stateElementId, districtElementId) 
        {
          var selectedStateIndex = document.getElementById(stateElementId).selectedIndex;
          var districtElement = document.getElementById(districtElementId);
          districtElement.length = 0;
          districtElement.options[0] = new Option('Select district', '');
          districtElement.selectedIndex = 0;
          var district_ar = district_arr[selectedStateIndex].split("|");
          for (var i = 0; i < district_ar.length; i++) 
          {
            districtElement.options[districtElement.length] = new Option(district_ar[i], district_ar[i]);
          }
        }
    
        function populateStates(stateElementId, districtElementId)
        {
          // given the id of the <select> tag as function argument, it inserts <option> tags
          var stateElement = document.getElementById(stateElementId);
          stateElement.length = 0;
          stateElement.options[0] = new Option('Select state', '-1');
          stateElement.selectedIndex = 0;
          for (var i = 0; i < states_arr.length; i++)
          {
            stateElement.options[stateElement.length] = new Option(states_arr[i], states_arr[i]);
          }
    
          // Assigned all countries. Now assign event listener for the states.
    
          if (districtElementId) 
          {
            stateElement.onchange = function () 
            {
              populateDistricts(stateElementId, districtElementId);
            };
          }
        }
      </script>
    </head>
<body>
    <div class="col-12" style="height: 100px">
        <!-- Output a div element with an "comname" ID -->
        <div id="comname">
        </div>
 
        <!-- Output a div element with a "nav" ID and a "col-12" class -->
        <div id="nav" class="col-12">
            <!-- Output an unordered list -->
            <ul>
 
                <!-- Output a list item with a link to the "find_blood.php" page -->
                <li><a class="active" href="find_blood.php">Find Donor</a></li>
 
                <!-- Output a list item with a link to the "register.php" page -->
                <li><a href="register.php">Be A Donor</a></li>
                <?php
                // Check if the session variable "sess_user_id" is set and not empty
                if (isset($_SESSION['sess_user_id']) && !empty($_SESSION['sess_user_id'])) {
                    // Output a list item with a link to the "logout.php" page
                    echo '<li style="background-color: rgba(255,0,0,0.5);"><a href="logout.php">Logout</a></ul>';
                }
                ?>
            </ul>
        </div>
 
 
    </div>
    <div style="margin: 0; padding: 0 3% 0 7%; text-align: center;">
        <!-- Output a div element with a "col-11" class and some inline styles -->
        <div class="col-11" style="background-color: rgba(82, 127, 99,0.5); padding: 0">
            <!-- Output a div element with some inline styles -->
            <div style="background-color: rgb(5 85 92);overflow: auto;width: 100%; padding: 5px;">
                <!-- Output a form element -->
                <form action = "" method = "$_GET">
                    <!-- Output a select element with some inline JavaScript -->
                    <select name="bloodgroup" onchange="showUser(this.value)" id="sel">
                        <option value = "A+">A RhD positive (A+)</option>
                        <option value = "A-">A RhD negative (A-)</option>
                        <option value = "B+">B RhD positive (B+)</option>
                        <option value = "B-">B RhD negative (B-)</option>
                        <option value = "O+">O RhD positive (O+)</option>
                        <option value = "O-">O RhD negative (O-)</option>
                        <option value = "AB+">AB RhD positive (AB+)</option>
                        <option value = "AB-">AB RhD negative (AB-)</option>
                    </select>
                    <label>STATE</label>
                    <select id="state_input" name="state_input" onchange="showUser(this.value)" id="sel" ></select><br>
                    <label>DISTRICT</label><br>
                    <select name="district_input" id="district_input" onchange="showUser(this.value)" id="sel"></select>
                    <script language="javascript">
                        populateStates("state_input", "district_input");
                    </script>
                </form>
            </div>
            <!-- Output a div element with some inline styles and an "txtHint" ID -->
            <div id="txtHint" style="padding: 5% 0 5% 0; width: 100%; overflow: auto;"></div>
        </div>
    </div>
 
    <?php
        // Check if the GET superglobal variable is set
        if (isset($_GET))
        {
            // Set $a to the value of the "bloodgroup" parameter in the GET request, or to "A pos" if it is not set
            $blood_type = $_GET["bloodgroup"] ?? "A RhD positive (A+)";
            $state_required = $GET["state"] ?? "--";
            $district_required = $GET["district"] ?? "--"; 
        }
        else 
        {
            // Set $a to an empty string if the GET superglobal is not set
            $blood_type = "";
            $state_required = "";
            $district_required = ""; 
        }
    ?>
 
    <script>
        // When the page finishes loading
        window.onload = function () 
        {
            // Get the value of the PHP variable $a the user needs blood for
            var val = '<?php echo $blood_type; ?>';
            var val_state = '<?php echo $; ?>';
            var val_district = '<?php echo $blood_type; ?>';
            
            // Get the element with the "sel" ID
            var sel = document.getElementById('sel');
            
            // Get the options in the element
            var opts = sel.options;
            // Loop through the options
            
            for (var opt, j = 0; opt = opts[j]; j++) {
                // If the option value matches the value of $a
                if (opt.value == val) {
                    // Set the selected index of the element to the current option
                    sel.selectedIndex = j;
                    // Break out of the loop
                    break;
                }
            }
            // Get the value of the PHP variable $a
            var va = '<?php echo $blood_type; ?>';

            // Call the showUser function with the value of $a as an argument
            showUser(va);
        }
    </script>
 
</body>
</html>