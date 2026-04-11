<?php

$countries = array('India', 'Rwanda', 'Kenya', 'Uganda', 'Tanzania', 'Nigeria', 'Ghana', 'South Africa', 'Egypt', 'United States', 'United Kingdom', 'Germany', 'France', 'Canada', 'Australia', 'Japan', 'China', 'Brazil');
$months = array(
    '01' => 'January',
    '02' => 'February',
    '03' => 'March',
    '04' => 'April',
    '05' => 'May',
    '06' => 'June',
    '07' => 'July',
    '08' => 'August',
    '09' => 'September',
    '10' => 'October',
    '11' => 'November',
    '12' => 'December'
);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Student Registration Form</title>
  <link rel="stylesheet" href="styles.css" />
</head>
<body>
  <main class="page-shell">
    <section class="form-wrapper">
      <h1 class="form-title">Student Registration Form</h1>

      <form action="insert.php" method="post">
        <div class="form-row">
          <label for="firstName">First Name</label>
          <div class="field"><input type="text" id="firstName" name="firstName" required /></div>
        </div>

        <div class="form-row">
          <label for="lastName">Last Name</label>
          <div class="field"><input type="text" id="lastName" name="lastName" required /></div>
        </div>

        <div class="form-row">
          <label>Date of Birth</label>
          <div class="field dob-group">
            <select name="dobDay" required>
              <option value="">Day</option>
              <?php for ($day = 1; $day <= 31; $day++): ?>
                <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
              <?php endfor; ?>
            </select>
            <select name="dobMonth" required>
              <option value="">Month</option>
              <?php foreach ($months as $value => $label): ?>
                <option value="<?php echo $value; ?>"><?php echo $label; ?></option>
              <?php endforeach; ?>
            </select>
            <select name="dobYear" required>
              <option value="">Year</option>
              <?php for ($year = date('Y'); $year >= 1950; $year--): ?>
                <option value="<?php echo $year; ?>"><?php echo $year; ?></option>
              <?php endfor; ?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <label for="email">Email ID</label>
          <div class="field"><input type="email" id="email" name="email" required /></div>
        </div>

        <div class="form-row">
          <label for="mobile">Mobile Number</label>
          <div class="field"><input type="text" id="mobile" name="mobile" required /></div>
        </div>

        <div class="form-row">
          <label>Gender</label>
          <div class="field gender-group">
            <label><input type="radio" name="gender" value="male" required /> Male</label>
            <label><input type="radio" name="gender" value="female" required /> Female</label>
          </div>
        </div>

        <div class="form-row">
          <label for="address">Address</label>
          <div class="field"><textarea id="address" name="address"></textarea></div>
        </div>

        <div class="form-row">
          <label for="city">City</label>
          <div class="field"><input type="text" id="city" name="city" /></div>
        </div>

        <div class="form-row">
          <label for="pincode">Pin Code</label>
          <div class="field"><input type="text" id="pincode" name="pincode" /></div>
        </div>

        <div class="form-row">
          <label for="state">State</label>
          <div class="field"><input type="text" id="state" name="state" /></div>
        </div>

        <div class="form-row">
          <label for="country">Country</label>
          <div class="field">
            <select id="country" name="country" required>
              <option value="">Select country</option>
              <?php foreach ($countries as $country): ?>
                <option value="<?php echo $country; ?>"><?php echo $country; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>

        <div class="form-row">
          <label>Hobbies</label>
          <div class="field hobbies-field">
            <div class="hobbies-group">
              <label><input type="checkbox" name="hobbies[]" value="Drawing" /> Drawing</label>
              <label><input type="checkbox" name="hobbies[]" value="Singing" /> Singing</label>
              <label><input type="checkbox" name="hobbies[]" value="Dancing" /> Dancing</label>
              <label><input type="checkbox" name="hobbies[]" value="Sketching" /> Sketching</label>
            </div>
            <div class="others-row">
              <label for="otherHobby">Others</label>
              <input type="text" id="otherHobby" name="otherHobby" />
            </div>
          </div>
        </div>

        <div class="section-gap"></div>

        <div class="qual-row">
          <div class="qual-label">Qualification</div>
          <div class="qual-table-wrapper">
            <table class="qual-table">
              <thead>
                <tr>
                  <th>Sl.No.</th>
                  <th>Examination</th>
                  <th>Board</th>
                  <th>Percentage</th>
                  <th>Year of Passing</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Class X</td>
                  <td><input type="text" name="board1" maxlength="10" /></td>
                  <td><input type="text" name="pct1" maxlength="5" /></td>
                  <td><input type="text" name="year1" maxlength="4" /></td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Class XII</td>
                  <td><input type="text" name="board2" maxlength="10" /></td>
                  <td><input type="text" name="pct2" maxlength="5" /></td>
                  <td><input type="text" name="year2" maxlength="4" /></td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Graduation</td>
                  <td><input type="text" name="board3" maxlength="10" /></td>
                  <td><input type="text" name="pct3" maxlength="5" /></td>
                  <td><input type="text" name="year3" maxlength="4" /></td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>Masters</td>
                  <td><input type="text" name="board4" maxlength="10" /></td>
                  <td><input type="text" name="pct4" maxlength="5" /></td>
                  <td><input type="text" name="year4" maxlength="4" /></td>
                </tr>
              </tbody>
            </table>
            <div class="qual-hints-row">
              <span class="qual-hint">(10 char max)</span>
              <span class="qual-hint">(upto 2 decimal)</span>
            </div>
          </div>
        </div>

        <div class="courses-row">
          <div class="courses-label">Courses<br />Applied For</div>
          <div class="courses-group">
            <label><input type="radio" name="course" value="BCA" required /> BCA</label>
            <label><input type="radio" name="course" value="BCom" required /> B.Com</label>
            <label><input type="radio" name="course" value="BSc" required /> B.Sc</label>
            <label><input type="radio" name="course" value="BA" required /> B.A</label>
          </div>
        </div>

        <div class="btn-row">
          <button type="submit">Submit</button>
          <button type="reset">Reset</button>
        </div>
      </form>
    </section>
  </main>
</body>
</html>
