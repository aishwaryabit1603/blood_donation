<?php
  //start a session output buffering
  ob_start();
  session_start();

  //must require db connection file
  require "db_connection.php";

  if(isset($_POST['name']) && isset($_POST['sex']) && isset($_POST['dob']) &&isset($_POST['bloodgroup']) &&isset($_POST['mobile_no']) &&isset($_POST['email']) &&isset($_POST['state']) && isset($_POST['district']) && isset($_POST['user_name']) &&isset($_POST['password']))
  {
    //checking if all post fields are SET
    if (!empty($_POST['name']) && !empty($_POST['sex']) && !empty($_POST['dob']) && !empty($_POST['bloodgroup']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) && !empty($_POST['state']) && !empty($_POST['district']) && !empty($_POST['user_name']) && !empty($_POST['password'])) 
    {
      // Store POST variables in local variables
      $user = $_POST['user_name'];
      $pw = $_POST['password'];
      $f_name = $_POST['name'];
      $birthday = $_POST['dob'];
      $sex = $_POST['sex'];
      $blood = $_POST['bloodgroup'];
      $mobile = $_POST['mobile_no'];
      $email = $_POST['email'];
      $state = $_POST['state'];
      $district = $_POST['district'];
      //checking if session is active or NOT
      if (isset($_SESSION['session_user_id']) && !empty($_SESSION['session_user_id'])) 
      {
        // If a session is active
        $sess = $_SESSION['session_user_id'];
        $SQL = "UPDATE donors SET user_name='" .$user . "',password='" . $pw . "',name='" . $f_name . "',dob='" . $birthday . "',sex='" . $sex . "',bloodgroup='" . $blood . "',mobile_no='" . $mobile . "',email='" . $email . "',state='" . $state . "',district='" . $district . "' WHERE id='" . $sess . "'";
      } 
      else 
      {
        $SQL = "INSERT INTO donors (user_name, password, name, dob, sex, bloodgroup, mobile_no, email,state,district) VALUES ('" . $user . "', '" . $pw . "', '" . $f_name . "', '" . $birthday . "', '" . $sex . "', '" . $blood . "', '" . $mobile . "', '" . $email . "', '" . $state . "', '" . $district . "')";
      }
      $query_run = mysqli_query($connection,$SQL);
      if($query_run)
      {
        // if query successful
        echo '<script language = "javascript">';
        echo 'alert("Message Successfully Sent !!")';
        echo '</script>';
        if (isset($_SESSION['sess_user_id']) && !empty($_SESSION['sess_user_id']))
        {
          header("location: logout.php");
        }
      }
      else
      {
        echo '<script language = "javascript">';
        echo 'alert("Registration Failed !!")';
        echo '</script>';
      }
    }
    else
    {
      echo '<script language = "javascript">';
      echo 'alert("Please Fill and Select All Required fields")';
      echo '</script>';
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTRATION FORM</title>
    
    <script type="text/javascript">
    <link rel="stylesheet" type="TEXT/CSS" href="css/form_css.css"/>
        
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
      districtElement.options[0] = new Option('Select district', '-1');
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
      </scrip>
</head>
<body>
    
  <div class="form-container">
      <form action = "" method = "post" action="javascript:handleClick()">
          <h3>REGISTER HERE</h3>
          
          <label>Name : </label>
          <input type = "text" name = "name" required placeholder = "ENTER YOUR NAME"><br>
          
          <label>DATE OF BIRTH : </label>
          <input type = "date" name = "dob" required placeholder = "ENTER YOUR DATE-OF-BIRTH"><br>
          
          <label>GENDER : </label>
          <select name = "gender" required>
              <option value = "male">Male</option>
              <option value = "female">Female</option>
              <option value = "other">Other</option>
          </select><br>
          
          <label>EMAIL : </label>
          <input type = "email" name = "email" required placeholder = "ENTER YOUR email"><br>
          
          <label>CONTACT NUMBER : </label>
          <input type = "tel" name = "contact" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" required placeholder = "ENTER YOUR PHONE NUMBER"><br>
          
          <label>BLOOD TYPE : </label>
          <select name = "blood_type" required>
                <option value = "A+">A RhD positive (A+)</option>
                <option value = "A-">A RhD negative (A-)</option>
                <option value = "B+">B RhD positive (B+)</option>
                <option value = "B-">B RhD negative (B-)</option>
                <option value = "O+">O RhD positive (O+)</option>
                <option value = "O-">O RhD negative (O-)</option>
                <option value = "AB+">AB RhD positive (AB+)</option>
                <option value = "AB-">AB RhD negative (AB-)</option>
          </select><br>

          <label>STATE</label>
          <select id="state_input" name="state_input" required></select><br>
          <label>DISTRICT</label>
          <select name="district_input" id="district_input" required></select>
          <script language="javascript">
              populateStates("state_input", "district_input");
          </script>
          
          <br>
          <label>SET PASSWORD : </label>
          <input type = "password" name = "password" required placeholder = "SET PASSWORD"><br>

          <input type = "button" name = "submit" VALUE = "SUBMIT"><br>

          <input type = "button" name = "clear" value = "CLEAR">
      </form>
      <h3>Already have an account <a href = "login.html">LOGIN HERE</a></h3>
      
  </div>
</body>
</html>