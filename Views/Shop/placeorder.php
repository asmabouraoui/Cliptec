<?php
include '../../Controllers/Shop/mail.php';

if (!isset($_SESSION['cart_items']) || empty($_SESSION['cart_items'])) {
  header('location:index.php');
  exit();
}

require_once('helpers.php');
$cartItemCount = count($_SESSION['cart_items']);

//pre($_SESSION);

if (isset($_POST['submit'])) {
  if (isset($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['address'], $_POST['country'], $_POST['state'], $_POST['zipcode']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['address']) && !empty($_POST['country']) && !empty($_POST['state']) && !empty($_POST['zipcode'])) {
    $firstName = $_POST['first_name'];

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == false) {
      $errorMsg[] = 'Please enter valid email address';
    } else {
      //validate_input is a custom function
      //you can find it in helpers.php file
      $firstName  = validate_input($_POST['first_name']);
      $lastName   = validate_input($_POST['last_name']);
      $email      = validate_input($_POST['email']);
      $address    = validate_input($_POST['address']);
      $address2   = (!empty($_POST['address']) ? validate_input($_POST['address']) : '');
      $country    = validate_input($_POST['country']);
      $state      = validate_input($_POST['state']);
      $zipcode    = validate_input($_POST['zipcode']);

      $sql = 'insert into orders (first_name, last_name, email, address, address2, country, state, zipcode, order_status,created_at, updated_at) values (:fname, :lname, :email, :address, :address2, :country, :state, :zipcode, :order_status,:created_at, :updated_at)';
      $statement = $pdo->prepare($sql);
      $params = [
        'fname' => $firstName,
        'lname' => $lastName,
        'email' => $email,
        'address' => $address,
        'address2' => $address2,
        'country' => $country,
        'state' => $state,
        'zipcode' => $zipcode,
        'order_status' => 'confirmed',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
      ];

      $statement->execute($params);
      if ($statement->rowCount() == 1) {

        $getOrderID = $pdo->lastInsertId();

        if (isset($_SESSION['cart_items']) || !empty($_SESSION['cart_items'])) {
          $sqlDetails = 'insert into order_details (order_id, product_id, product_name, product_price, qty, total_price) values(:order_id,:product_id,:product_name,:product_price,:qty,:total_price)';
          $orderDetailStmt = $pdo->prepare($sqlDetails);

          $totalPrice = 0;
          foreach ($_SESSION['cart_items'] as $item) {
            $itemTotalPrice = $item['price'] * $item['quantity'];
            $totalPrice += $itemTotalPrice;

            $paramOrderDetails = [
              'order_id' =>  $getOrderID,
              'product_id' =>  $item['id'],
              'product_name' =>  $item['name'],
              'product_price' =>  $item['price'],
              'qty' =>  $item['quantity'],
              'total_price' =>  $itemTotalPrice
            ];

            $orderDetailStmt->execute($paramOrderDetails);
          }

          $updateSql = 'update orders set total_price = :total where id = :id';

          $rs = $pdo->prepare($updateSql);
          $prepareUpdate = [
            'total' => $totalPrice,
            'id' => $getOrderID
          ];

          $rs->execute($prepareUpdate);

          unset($_SESSION['cart_items']);
          unset($_SESSION['cart']);
          $_SESSION['confirm_order'] = true;
          $email = $email;
          $email_content = array(
            'Subject' => 'EasyRocket Order confirmation',
            'body' => "Dear " . $firstName . " " . $lastName .  "<br>We are hereby confirming your order n:" . $getOrderID .
               "<br>Your total order price is :" . $totalPrice . "$" .  "<br>Thank you for the support"
          );
          sendemail($email, $email_content);
          header('location:thank-you.php');
          exit();
        }
      } else {
        $errorMsg[] = 'Unable to save your order. Please try again';
      }
    }
  } else {
    $errorMsg = [];

    if (!isset($_POST['first_name']) || empty($_POST['first_name'])) {
      $errorMsg[] = 'First name is required';
    } else {
      $fnameValue = $_POST['first_name'];
    }

    if (!isset($_POST['last_name']) || empty($_POST['last_name'])) {
      $errorMsg[] = 'Last name is required';
    } else {
      $lnameValue = $_POST['last_name'];
    }

    if (!isset($_POST['email']) || empty($_POST['email'])) {
      $errorMsg[] = 'Email is required';
    } else {
      $emailValue = $_POST['email'];
    }

    if (!isset($_POST['address']) || empty($_POST['address'])) {
      $errorMsg[] = 'Address is required';
    } else {
      $addressValue = $_POST['address'];
    }

    if (!isset($_POST['country']) || empty($_POST['country'])) {
      $errorMsg[] = 'Country is required';
    } else {
      $countryValue = $_POST['country'];
    }

    if (!isset($_POST['state']) || empty($_POST['state'])) {
      $errorMsg[] = 'State is required';
    } else {
      $stateValue = $_POST['state'];
    }

    if (!isset($_POST['zipcode']) || empty($_POST['zipcode'])) {
      $errorMsg[] = 'Zipcode is required';
    } else {
      $zipCodeValue = $_POST['zipcode'];
    }


    if (isset($_POST['address2']) || !empty($_POST['address2'])) {
      $address2Value = $_POST['address2'];
    }
  }
}

$pageTitle = '';
$metaDesc = '';

?>
<?= template_header('Checkout') ?>
<div class="container">
  <div class="row mt-3">
    <div class="col-md-4 order-md-2 mb-4">
      <h4 class="d-flex justify-content-between align-items-center mb-3">
        <span class="text-muted">Your cart</span>
        <span class="badge badge-secondary badge-pill"><?php echo $cartItemCount; ?></span>
      </h4>
      <ul class="list-group mb-3">
        <?php

        $total = 0;
        foreach ($_SESSION['cart_items'] as $cartItem) {
          $itemTotalPrice = $cartItem['price'] * $cartItem['quantity'];
          $total += $itemTotalPrice;
        ?>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0"><?php echo $cartItem['name'] ?></h6>
              <small class="text-muted">Quantity: <?php echo $cartItem['quantity'] ?> X Price: <?php echo $cartItem['price'] ?></small>
            </div>
            <span class="text-muted">$<?php echo $itemTotalPrice ?></span>
          </li>
        <?php
        }
        ?>

        <li class="list-group-item d-flex justify-content-between">
          <span>Total (USD)</span>
          <strong>$<?php echo number_format($total, 2); ?></strong>
        </li>
      </ul>
    </div>
    <div class="col-md-8 order-md-1">
      <h4 class="mb-3">Billing address</h4>
      <?php
      if (isset($errorMsg) && count($errorMsg) > 0) {
        foreach ($errorMsg as $error) {
          echo '<div class="alert alert-danger">' . $error . '</div>';
        }
      }
      ?>
      <form class="needs-validation" method="POST">
        <div class="row">
          <div class="col-md-6 mb-3">
            <label for="firstName">First name</label>
            <input type="text" class="form-control" id="firstName" name="first_name" placeholder="First Name" value="<?php echo $_SESSION['name']; ?>">
          </div>
          <div class="col-md-6 mb-3">
            <label for="lastName">Last name</label>
            <input type="text" class="form-control" id="lastName" name="last_name" placeholder="Last Name" value="<?php echo $_SESSION['lastname'];?>">
          </div>
        </div>

        <div class="mb-3">
          <label for="email">Email</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" value="<?php echo $_SESSION['email']; ?>">
        </div>

        <div class="mb-3">
          <label for="address">Address</label>
          <input type="text" class="form-control" id="address" name="address" placeholder="1234 Main St" value="<?php echo (isset($addressValue) && !empty($addressValue)) ? $addressValue : '' ?>">
        </div>

        <div class="mb-3">
          <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
          <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite" value="<?php echo (isset($address2Value) && !empty($address2Value)) ? $address2Value : '' ?>">
        </div>

        <div class="row">
          <div class="col-md-5 mb-3">
            <label for="country">Country</label>
            <select class="custom-select d-block w-100" name="country" id="country">
              <option value="">Choose...</option>
              <option value="Tunisia">Tunisia</option>
            </select>
          </div>
          <div class="col-md-4 mb-3">
            <label for="state">State</label>
            <select class="custom-select d-block w-100" name="state" id="state">
              <option value="">Choose...</option>
              <option value="Ariana">Ariana</option>
              <option value="Beja">Béja</option>
              <option value="Ben Arous">Ben Arous</option>
              <option value="Bizerte">Bizerte</option>
              <option value="Gabes">Gabès</option>
              <option value="Gafsa">Gafsa</option>
              <option value="Jendouba">Jendouba</option>
              <option value="Kairouan">Kairouan</option>
              <option value="Kasserine">Kasserine</option>
              <option value="Kebili">Kébili</option>
              <option value="Le Kef">Le Kef</option>
              <option value="Mahdia">Mahdia</option>
              <option value="La Manouba">La Manouba</option>
              <option value="Medenine">Médenine</option>
              <option value="Monastir">Monastir</option>
              <option value="Nabeul">Nabeul</option>
              <option value="Sfax">Sfax</option>
              <option value="Sidi Bouzid">Sidi Bouzid</option>
              <option value="Siliana">Siliana</option>
              <option value="Sousse">Sousse</option>
              <option value="Tataouine">Tataouine</option>
              <option value="Tozeur">Tozeur</option>
              <option value="Tunis">Tunis</option>
              <option value="Zaghouan">Zaghouan</option>
            </select>
          </div>
          <div class="col-md-3 mb-3">
            <label for="zip">Zip</label>
            <input type="text" class="form-control" id="zip" name="zipcode" placeholder="" value="<?php echo (isset($zipCodeValue) && !empty($zipCodeValue)) ? $zipCodeValue : '' ?>">
          </div>
        </div>
        <hr class="mb-4">

        <h4 class="mb-3">Payment</h4>

        <div class="d-block my-3">
          <div class="custom-control custom-radio">
            <input id="cashOnDelivery" name="cashOnDelivery" type="radio" class="custom-control-input" checked="">
            <label class="custom-control-label" for="cashOnDelivery">Cash on Delivery</label>
          </div>
        </div>

        <hr class="mb-4">
        <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit" value="submit">Continue to checkout</button>
      </form>
    </div>
  </div>
</div>