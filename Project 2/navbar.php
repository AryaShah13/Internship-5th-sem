<link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>   
   <nav>
            <nav class="bg-white dark:bg-gray-800 antialiased">
                <div class="max-w-screen-xl px-4 mx-auto 2xl:px-0 py-4">
                  <div class="flex items-center justify-between">
              
                    <div class="flex items-center space-x-8">
                     
              
                      <ul class="hidden lg:flex items-center justify-start gap-6 md:gap-8 py-3 sm:justify-center">
                        <h1 class="text-3xl font-bold text-gray-800">Craft Plus</h1>
                        <li>
                          <a href="index.php" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Home
                          </a>
                        </li>
                        <li class="shrink-0">
                          <a href="#" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Best Sellers
                          </a>
                        </li>
                        <li class="shrink-0">
                          <a href="#" title="" class="flex text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Gift Ideas
                          </a>
                        </li>
                        <li class="shrink-0">
                          <a href="#" title="" class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Today's Deals
                          </a>
                        </li>
                        <li class="shrink-0">
                          <a href="#" title="" class="text-sm font-medium text-gray-900 hover:text-primary-700 dark:text-white dark:hover:text-primary-500">
                            Sell
                          </a>
                        </li>
                      </ul>
                    </div>
              
                   <!-- My Cart Dropdown HTML Structure -->
                   <div class="relative">
  <a href="cart.php" 
     class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
    <span class="sr-only">Cart</span>
    <svg class="w-5 h-5 lg:me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
    </svg>
    <span class="hidden sm:flex">My Cart</span>
    <svg class="hidden sm:flex w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
    </svg>
  </a>
</div>

<style>
  [data-dropdown-toggle] {
    position: relative;
    cursor: pointer;
  }

  #myCartDropdown {
    display: none;
  }

  [data-dropdown-toggle]:focus + #myCartDropdown,
  [data-dropdown-toggle]:hover + #myCartDropdown {
    display: block;
  }

  #myCartDropdownButton:hover {
    background-color: #f0f0f0;
  }
</style>

                      <button id="userDropdownButton1" data-dropdown-toggle="userDropdown1" type="button" class="inline-flex items-center rounded-lg justify-center p-2 hover:bg-gray-100 dark:hover:bg-gray-700 text-sm font-medium leading-none text-gray-900 dark:text-white">
                        <svg class="w-5 h-5 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg>              
                        Account
                        <svg class="w-4 h-4 text-gray-900 dark:text-white ms-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/>
                        </svg> 
                      </button>
              
                      <div id="userDropdown1" class="hidden z-10 w-56 divide-y divide-gray-100 overflow-hidden overflow-y-auto rounded-lg bg-white antialiased shadow dark:divide-gray-600 dark:bg-gray-700">
                        <ul class="p-2 text-start text-sm font-medium text-gray-900 dark:text-white">
                          <li><a href="signup.php" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> My Account </a></li>
                          <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> My Orders </a></li>
                          <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> Settings </a></li>
                          <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> Favourites </a></li>
                          <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> Delivery Addresses </a></li>
                          <li><a href="#" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> Billing Data </a></li>
                        </ul>
                    
                        <div class="p-2 text-sm font-medium text-gray-900 dark:text-white">
                          <a href="logout.php" title="" class="inline-flex w-full items-center gap-2 rounded-md px-3 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600"> Log Out </a>
                        </div>
                      </div>
              
                      <button type="button" data-collapse-toggle="ecommerce-navbar-menu-1" aria-controls="ecommerce-navbar-menu-1" aria-expanded="false" class="inline-flex lg:hidden items-center justify-center hover:bg-gray-100 rounded-md dark:hover:bg-gray-700 p-2 text-gray-900 dark:text-white">
                        <span class="sr-only">
                          Open Menu
                        </span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                          <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                        </svg>                
                      </button>
                    </div>
                  </div>
              
                  <div id="ecommerce-navbar-menu-1" class="bg-gray-50 dark:bg-gray-700 dark:border-gray-600 border border-gray-200 rounded-lg py-3 hidden px-4 mt-4">
                    <ul class="text-gray-900 dark:text-white text-sm font-medium dark:text-white space-y-3">
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home</a>
                      </li>
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Best Sellers</a>
                      </li>
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Gift Ideas</a>
                      </li>
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Games</a>
                      </li>
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Electronics</a>
                      </li>
                      <li>
                        <a href="#" class="hover:text-primary-700 dark:hover:text-primary-500">Home & Garden</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </nav>
              <style>
              *{
    margin:0px;
    padding:0px;
}
.nav h1{
    font-size: 24px;
    font-weight: bold;
}
.menu-section {
  width: 100%;
  background: linear-gradient(to right, #1c1c1c, #333);
  padding: 20px;
  border-radius: 12px;
  display: flex;
  justify-content: center;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4);
  position: relative;
}

.menu-section:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: url('christmas-background.png') no-repeat center center/cover;
  opacity: 0.2;
  z-index: 0;
  border-radius: 12px;
}

.menu-container {
  display: flex;
  gap: 30px;
  justify-content: space-around;
  align-items: center;
  max-width: 1400px;
  overflow-x: auto;
  z-index: 1;
}

.menu-item {
  text-align: center;
  flex: 0 0 auto;
  transition: transform 0.3s, box-shadow 0.3s;
}

.menu-item:hover {
  transform: scale(1.1);
  box-shadow: 0 8px 20px rgba(255, 255, 255, 0.5);
}

.menu-item img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
  margin-bottom: 10px;
  transition: transform 0.3s;
}

.menu-item img:hover {
  transform: scale(1.3);
}

.dropdown {
  position: relative;
}

.dropdown-button {
  background-color: #e74c3c;
  color: white;
  padding: 10px 15px;
  border: none;
  border-radius: 10px;
  font-size: 14px;
  font-weight: bold;
  cursor: pointer;
  transition: background-color 0.3s;
}

.dropdown-button:hover {
  background-color: #c0392b;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: rgba(255, 255, 255, 0.9);
  border: 1px solid #ddd;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
  border-radius: 10px;
  margin-top: 8px;
  z-index: 100;
  min-width: 160px;
}

.dropdown-content a {
  display: block;
  padding: 10px 15px;
  color: #2c3e50;
  text-decoration: none;
  border-bottom: 1px solid #f0f0f0;
  transition: background-color 0.2s;
}

.dropdown-content a:hover {
  background-color: #bdc3c7;
}

.dropdown:hover .dropdown-content {
  display: block;
}</style>