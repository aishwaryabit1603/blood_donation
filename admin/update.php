<?php
  require 'C:\xampp\htdocs\blood_donation\db_connection.php';
  $id = $_GET['update_id'];
  $select = $query = "SELECT id_no, name, email, sex,dob, mobile_no, bloodgroup, state, district FROM donors where id_no = '$id'";
  $data = mysqli_query($connection,$select);
  $row = mysqli_fetch_array($data);

  if(isset($_POST['update']))
  {
    if(!empty($_POST['name']) && !empty($_POST['dob']) && !empty($_POST['sex']) && !empty($_POST['blood_type']) && !empty($_POST['mobile_no']) && !empty($_POST['email']) &&!empty($_POST['state_input']) && !empty($_POST['district_input']))
    {
        $f_name = strtolower($_POST['name']) ;
        $f_name = ucfirst($f_name);
        $birthday = $_POST['dob'];
        $sex = $_POST['sex'];
        $blood = $_POST['blood_type'];
        $mobile = $_POST['mobile_no'];
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $state = $_POST['state_input'];
        $district = $_POST['district_input'];
        $sql = "UPDATE donors set name = '$f_name',dob = '$birthday',sex = '$sex',bloodgroup = '$blood',mobile_no = '$mobile',email = '$email',state = '$state',district = '$district' where id_no = '$id' ";
        $result = mysqli_query($connection,$sql);
        if($result)
        {
            echo "<script type ='text/JavaScript'>";  
            echo "alert('Updated Successfully')";
            echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
            echo '</script>';
        }
        else
        {
            echo "<script type ='text/JavaScript'>";  
            echo "alert('Not Updated !!!')";
            echo 'window.location.href = "http://localhost:8080/blood_donation/admin/display.php" ';
            echo '</script>';
            
            die(mysqli_error($connection));
        }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="icon" type="image/x-icon" href="C:\xampp\htdocs\blood_donation\images\icon2.ico" />
    <script type="text/javascript">
        var states_arr = new Array("Select State" , "Andhra Pradesh" , "Arunachal Pradesh" , "Assam" , "Bihar" , "Chhattisgarh" , "Goa" , "Gujarat" , "Haryana" , "Himachal Pradesh" , "Jammu and Kashmir" , "Jharkhand" , "Karnataka" , "Kerala" , "Madhya Pradesh" , "Maharashtra" , "Manipur" , "Meghalaya" , "Mizoram" , "Nagaland" , "Orissa" , "Punjab" , "Rajasthan" , "Sikkim" , "Tamil Nadu" , "Telangana" , "Tripura" , "Uttar Pradesh" , "Uttaranchal" , "West Bengal" , "Andaman and Nicobar Islands" , "Chandigarh" , "Dadra and Nagar Haveli" , "Daman and Diu" , "Delhi" , "Lakshadweep" , "Pondicherry");
        var district_arr = new Array();
        district_arr[0] = "Select District";
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
          districtElement.length = 1;
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
          stateElement.options[0] = new Option('Select State', '-1');
          
          stateElement.selectedIndex = 0;
          for (var i = 1; i < states_arr.length; i++)
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
        const button = document.querySelector('.btn')
        const form   = document.querySelector('.form')

        button.addEventListener('click', function() {
          form.classList.add('form--no') 
        });
    </script>
    <style>
      $font-family:   "Roboto";
      $font-size:     14px;
      $color-primary: #ABA194;

      * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      body {
        font-family: $font-family;
        font-size: $font-size;
        color = $color-primary;
        background-size: 200% 100% !important;
        animation: move 10s ease infinite;
        transform: translate3d(0, 0, 0);
        background: linear-gradient(45deg, #49D49D 10%, #A2C7E5 90%);
        height: 100vh
      }

      .user {
        width: 90%;
        max-width: 340px;
        margin: 10vh auto;
      }

      .user__header {
        text-align: center;
        opacity: 0;
        transform: translate3d(0, 500px, 0);
        animation: arrive 500ms ease-in-out 0.7s forwards;
      }

      .user__title {
        font-size: $font-size;
        margin-bottom: -10px;
        font-weight: 500;
        color: white;
      }

      .form {
        margin-top: 40px;
        border-radius: 6px;
        overflow: hidden;
        opacity: 0;
        transform: translate3d(0, 500px, 0);
        animation: arrive 500ms ease-in-out 0.9s forwards;
      }

      .form--no {
        animation: NO 1s ease-in-out;
        opacity: 1;
        transform: translate3d(0, 0, 0);
      }

      .form__input {
        display: block;
        width: 100%;
        padding: 20px;

        -webkit-appearance: none;
        border: 0;
        outline: 0;
        transition: 0.3s;
        
        &:focus {
            background: darken(#fff, 3%);
        }
      }

      .btn {
        display: block;
        width: 100%;
        padding: 20px;
        font-family: $font-family;
        -webkit-appearance: none;
        outline: 0;
        border: 0;
        color: black;
        text-decoration-thickness: 5px; 
        background: $color-primary;
        transition: 0.3s;
        
        &:hover {
            background: darken($color-primary, 5%);
        }
      }
      @keyframes NO {
      from, to {
        -webkit-transform: translate3d(0, 0, 0);
        transform: translate3d(0, 0, 0);
      }

      10%, 30%, 50%, 70%, 90% {
        -webkit-transform: translate3d(-10px, 0, 0);
        transform: translate3d(-10px, 0, 0);
      }

      20%, 40%, 60%, 80% {
        -webkit-transform: translate3d(10px, 0, 0);
        transform: translate3d(10px, 0, 0);
      }
      }

      @keyframes arrive {
        0% {
            opacity: 0;
            transform: translate3d(0, 50px, 0);
        }
        
        100% {
            opacity: 1;
            transform: translate3d(0, 0, 0);
        }
      }

      @keyframes move {
        0% {
            background-position: 0 0
        }

        50% {
            background-position: 100% 0
        }

        100% {
            background-position: 0 0
        }
      }
    </style>
</head>
<body>
<div class="user">
    <header class="user__header">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3219/logo.svg" alt="" />
    </header>
    <form class="form" method = "post" action = "update.php" autocomplete="off">
        <div class="form__group">
          <input
            type="text"
            placeholder="Update a Donor"
            class="form__input"
            disabled
            style="
              font-weight: 500;
              font-size: 20px;
              color: black;
              background-color: #fff;
            "
          />
        </div>
        <div class="form__group">
          <input type="text" name = "name" value = "<?php echo $row['name'] ?>" class="form__input" required />
        </div>
        
        <div class="form__group">
          <input type="email" value = "<?php echo $row['email'] ?>" name = "email" class="form__input" required />
        </div>
        
        <div class="form__group">
          <input type="tel"  value = "<?php echo $row['mobile_no'] ?>"" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form__input" name = "mobile_no" required/>
        </div>
        <div class="form__group">
            
        <div class="form__group">
          <input type="date" value = "<?php echo $row['dob'] ?>" name = "dob" class="form__input" required >
        </div>
        <div class="form__group">
          
        <div class="form__group">
           <select name = "sex" class="form__input" required/>
                <option value = "" disabled selected><?php echo $row['sex'] ?></option>
                <option value = "male">Male</option>
                <option value = "female">Female</option>
                <option value = "other">Other</option>
           </select>
        </div>
        
        <div class="form__group">
          <select name = "blood_type"  class="form__input" required>
            <option value = "" selected disabled required><?php echo $row['bloodgroup'] ?></option>
            <option value = "A+">A RhD positive (A+)</option>
            <option value = "A-">A RhD negative (A-)</option>
            <option value = "B+">B RhD positive (B+)</option>
            <option value = "B-">B RhD negative (B-)</option>
            <option value = "O+">O RhD positive (O+)</option>
            <option value = "O-">O RhD negative (O-)</option>
            <option value = "AB+">AB RhD positive (AB+)</option>
            <option value = "AB-">AB RhD negative (AB-)</option>
          </select>
        </div>
        
      <div class="form__group">
        <select id="state_input" name="state_input" class="form__input"  required>
        </select>
        <select name="district_input" id="district_input" class="form__input" value = "<?php echo $row['district'] ?>" required>
        </select>
        <script language="javascript">
            populateStates("state_input", "district_input");
        </script>
        </div>

        <div class="form__group">
          <input type="submit" value = "update" class="form__input" name = "update" required/>
        </div>

        <button class="btn" type="reset">Clear</button>
    </form>
</div> 
</body>
</html>