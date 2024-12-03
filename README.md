EKE VICTOR CHIBUZO (BACKEND STACK)

FUTO LOCATE HOME PAGE DOCUMENTATION
This document describes the structure and functionality of the FUTO Locate – Home page. 
The page serves as the access to user signup, user login and admin login interface for "FUTO Locate" system.

1. Overview
•	Purpose: To provide an interface for administrators to securely log into the FUTO Locate system.
•	Features: 
o	User-friendly form design for admin login.
o	Password visibility toggle.
o	Link to reset forgotten passwords.
o	Link to return to the home page.

2. File Structure and Dependencies
The page relies on external CSS and JavaScript files to ensure proper styling and functionality:
•	CSS: ../public/css/style2.css 
o	Styles the layout and elements of the login page.
•	JavaScript: ../public/js/togglePasswordVisibility.js 
o	Adds interactivity to toggle password visibility.
o	Loaded with the defer attribute to ensure proper execution after the DOM is fully loaded.

3. HTML Structure
<head> Section
•	Meta Tags: 
o	charset="UTF-8": Ensures proper character encoding.
o	viewport: Enables responsive design for mobile and desktop devices.
•	Title: Displays "FUTO Locate - User Login" in the browser tab.
•	External Files: 
o	CSS for styling.
o	JavaScript for password visibility toggle.

<body> Section
1.	Container Division: Wraps the entire content of the page for styling purposes.
2.	Navbar:
o	Contains a <span> displaying the logo/title: FUTO Locate User Login, Signup and Admin Login.
3.	Login Form:
o	Form action: Submits data to ../public/ login.php?action=login via POST method.
o	Form action: Submits data to ../public/admin_login.php?action=login via POST method.
o	Form Elements: 
	Email Input: 
	type="email": Ensures proper email format.
	Required field for admin login.
	Password Input: 
	type="password": Hides input characters.
	id="password" for JavaScript interaction.
	Required field for admin login.
	Toggle Password Visibility: 
	<span> element with an icon (👁️) to toggle visibility using togglePasswordVisibility() function.
	Submit Button: 
	Submits the login form.
4.	Forgot Password Link:
o	Links to ../views/forgot_password.php?action=forgot_password.
o	Allows admins to reset their password if forgotten.
5.	Home Page Link:
o	Links to ../views/home.php?action=home.
o	Provides an option to navigate back to the application's homepage.

4. JavaScript Functionality
	The page includes a JavaScript function togglePasswordVisibility() (assumed to be defined in ../public/js/togglePasswordVisibility.js):
•	Purpose: Toggles the visibility of the password input field.
•	Execution: 
o	Triggered by clicking the 👁️ icon (<span> with onclick="togglePasswordVisibility()").

5. CSS Styling
The CSS file (style2.css) is expected to:
•	Style the container, navbar, and form elements.
•	Ensure responsive layout and alignment.
•	Style interactive elements like the toggle password icon and links.

6. User Flow
1.	Admin navigates to the login page.
2.	Inputs their email and password.
3.	Optionally toggles password visibility for verification.
4.	Clicks User Login to authenticate.
5.	If the password is forgotten, clicks the Forgot Password? link to reset it.
6.	Optionally navigates to the Home Page via the provided link.


FUTO Locate - Admin Page Documentation by Oguike Favour Uchechukwu 

Overview

The FUTO Locate Admin Page serves as the control panel for administrators to manage and update the app’s database. 
The admin panel allows users to input new locations, update details of existing locations, and configure GPS coordinates for each entry. 
This document provides a detailed guide to the functionality of the admin page.

Features

1. Add New Location

Form to input the name, description, and category of a location.

Field for GPS coordinates (latitude and longitude).

2. Edit Location

List of existing locations with search and filter functionality.

Options to update name, details, or coordinates.

3. Delete Location

Remove outdated or incorrect entries with a single action.

4. Interactive Map Integration


Futo User dashboard (Ogwuru Rosemary Favour- front end)

Welcome to futo locate app user interface"  This app is designed to provode users with a seamless and intuitive experince for navigagting and exploring teir suuroindings.

The Map View: the map view displays your current location, nearby points of interest and provide routing information
Search: the search feautures allows users to search for specific locations

Routing:The app provides turn-by-turn directions for walking, driving or using public transportation.

Settings: The settings menu allows users to customize the app's behaviour such as unit preferences, map style and notification seetings.

Verify and select locations directly on a map interface.


FUTO Locate - Login Page Documentation by Prosper C Martin 

Purpose

The login page provides secure access for administrators to the FUTO Locate admin dashboard.

Features

User Authentication

Input fields for email/username and password.

Secure backend validation.

Session Management

Persistent login with session tokens.

Logout button on the dashboard to clear sessions.

Password Recovery

"Forgot Password?" link for password reset via email.


UMEH AUGUSTINE (Front-End)
Login Page

#overview
#features
#login-credentials
#technical-requirements
#troubleshooting

Overview
The Locator App Login Page is a secure entry point for users to access the Locator App. 
This page allows users to enter their credentials and authenticate before gaining access to the app's features.

Features
1.  Secure username and password authenticatio
2.  Forgot password feature for easy recovery
3.  Option to remember login credentials for future session
4.  Clean and intuitive user interface

Login Credentials
1.  Username: [insert username
2.  Password: [insert password]

Note: Please keep your login credentials secure and do not share them with anyone.

Technical Requirements
Operating System: iOS/Android
Device: Smartphone/Tablet
Internet Connection: Required

Troubleshooting 
If you encounter any issues with the login process, please try resetting your password or contacting our support team.


User Sign-Up and Sign-In Page By Marshall Uzoma  
The sign-up and sign in pages allow the user to log in to the platform and create an account with ease. 
For the sign-up page, the user is only required to provide first and last name, an email and a secure password.
The login page requires just the registered email and password to enable the user access his or her account.


contributions by UGOCHUKWU DIVINEFAVOUR CHIMA
Using Google Maps on a Mobile Device

1. Open Google Maps: Launch the Google Maps app on your mobile device.
2. Search for a location: Type the name of the place or address in the search bar and press Enter.
3. Get the coordinates: Long press on the location marker on the map.
4. Copy the coordinates: Copy the latitude and longitude displayed in decimal degrees format from the pop-up window.

Conclusion

By following these simple steps, you can easily find the latitude and longitude of any place on Google Maps using your computer or mobile device.


Here's a detailed documentation for everything we've discussed and implemented so far. This covers:

Navigation Types Used: Stack, Drawer, and Bottom Tabs.
Screens and Components: Signup, Login, Home, Dashboard, and Settings.
Code Structure and Flow.
Dependencies and Installation.
API and State Management (if applicable in future).

1. Project Setup
Dependencies Installation
Run the following commands to set up your project with the required dependencies:
npm install @react-navigation/native react-native-screens react-native-safe-area-context react-native-gesture-handler react-native-reanimated react-native-svg
npm install @react-navigation/native-stack @react-navigation/drawer @react-navigation/bottom-tabs
npm install react-native-image-picker

If using Expo, ensure expo install is used for dependencies.

Project Directory Structure
bash
Copy code
project/
├── App.js                   # Entry point with navigation setup
├── screens/                 # Directory for screens
│   ├── SignupScreen.js      # Signup screen component
│   ├── Login.js             # Login screen component
│   ├── HomeScreen.js        # Home screen component
│   ├── Dashboard.js         # Dashboard screen component
│   └── SettingsScreen.js    # Settings screen with theme and profile options
└── package.json             # Project dependencies and metadata
2. Navigation Overview
a. Stack Navigation
Used for sequential navigation, starting with Signup and Login.

Code in App.js:

javascript
Copy code
const Stack = createNativeStackNavigator();

function StackNavigator() {
  return (
    <Stack.Navigator initialRouteName="Signup">
      <Stack.Screen name="Signup" component={SignupScreen} />
      <Stack.Screen name="Login" component={Login} />
      <Stack.Screen 
        name="Main" 
        component={DrawerNavigator} 
        options={{ headerShown: false }} 
      />
    </Stack.Navigator>
  );
}
b. Drawer Navigation
Provides a sidebar menu for accessing sections like Home & Dashboard (via tabs) and Settings.

Code in App.js:

javascript
Copy code
const Drawer = createDrawerNavigator();

function DrawerNavigator() {
  return (
    <Drawer.Navigator>
      <Drawer.Screen name="Tabs" component={TabNavigator} options={{ title: 'Home & Dashboard' }} />
      <Drawer.Screen name="Settings" component={SettingsScreen} />
    </Drawer.Navigator>
  );
}
If using Expo, ensure expo install is used for dependencies.

Project Directory Structure
bash
Copy code
project/
├── App.js                   # Entry point with navigation setup
├── screens/                 # Directory for screens
│   ├── SignupScreen.js      # Signup screen component
│   ├── Login.js             # Login screen component
│   ├── HomeScreen.js        # Home screen component
│   ├── Dashboard.js         # Dashboard screen component
│   └── SettingsScreen.js    # Settings screen with theme and profile options
└── package.json             # Project dependencies and metadata
2. Navigation Overview
a. Stack Navigation
Used for sequential navigation, starting with Signup and Login.

Code in App.js:

javascript
Copy code
const Stack = createNativeStackNavigator();

function StackNavigator() {
  return (
    <Stack.Navigator initialRouteName="Signup">
      <Stack.Screen name="Signup" component={SignupScreen} />
      <Stack.Screen name="Login" component={Login} />
      <Stack.Screen 
        name="Main" 
        component={DrawerNavigator} 
        options={{ headerShown: false }} 
      />
    </Stack.Navigator>
  );
}
b. Drawer Navigation
Provides a sidebar menu for accessing sections like Home & Dashboard (via tabs) and Settings.

Code in App.js:

javascript
Copy code
const Drawer = createDrawerNavigator();

function DrawerNavigator() {
  return (
    <Drawer.Navigator>
      <Drawer.Screen name="Tabs" component={TabNavigator} options={{ title: 'Home & Dashboard' }} />
      <Drawer.Screen name="Settings" component={SettingsScreen} />
    </Drawer.Navigator>
  );
}



UDOCHUKWU CHIKEZIE LOVEDAY
Here is a comprehensive documentation on the sign-up process for mobile app development:

Sign-up Process Documentation

Overview

The sign-up process allows users to create an account and access the app's features. 
This documentation outlines the steps involved in implementing a secure and user-friendly sign-up process.

Requirements

- User should be able to enter their email address, password, and other relevant details.
- Password should meet certain complexity requirements (e.g., minimum length, special characters).
- Email address should be validated to ensure it is correct and not already in use.
- User should receive a confirmation email or SMS to verify their account.

Design

1. Sign-up Form: Design a user-friendly sign-up form that collects the required information (e.g., email address, password, name).
2. Email Address Validation: Implement email address validation to ensure the user enters a correct and unique email address.
3. Password Complexity: Enforce password complexity requirements to ensure the user creates a secure password.
4. Confirmation Email/SMS: Send a confirmation email or SMS to the user's email address or phone number to verify their account.

Implementation

1. Front-end: Implement the sign-up form using a mobile-friendly front-end framework (e.g., React Native, Flutter).
2. Back-end: Create a back-end API to handle sign-up form submissions, validate user input, and send confirmation emails or SMS.
3. Database: Design a database schema to store user information and account details.

API Documentation

- Sign-up API Endpoint:
    - URL: /api/signup
    - Method: POST
    - Request Body: { "email": "user@example.com", "password": "password123", "name": "John Doe" }
    - Response: { "success": true, "message": "Account created successfully" }
- Error Handling:
    - Error Codes:
        - 400: Bad Request
        - 401: Unauthorized
        - 500: Internal Server Error
    - Error Messages:
        - Invalid email address
        - Password does not meet complexity requirements
        - Email address already in use

Testing

1. Unit Testing: Write unit tests to verify the functionality of individual components, such as the sign-up form and back-end API.
2. Integration Testing: Perform integration testing to ensure the sign-up process works seamlessly across different components and systems.
3. User Acceptance Testing (UAT): Conduct UAT to verify the sign-up process meets the required specifications and is user-friendly.

Security Considerations

1. Password Hashing: Use a secure password hashing algorithm (e.g., bcrypt, Argon2) to store passwords securely.
2. Email Address Validation: Validate email addresses using a secure validation algorithm (e.g., SPF, DKIM) to prevent email spoofing.
3. Secure Communication: Use secure communication protocols (e.g., HTTPS, TLS) to protect user data during transmission.


Search Page Documentation By Ezimkamma Chukwuka Christopher 

Overview

The search page is a core feature of the locator app, enabling users to find specific locations, businesses, or points of interest. This documentation provides an overview of the search page's functionality, design, and technical requirements.

Features

- Search Bar: A prominent search bar allows users to input their search queries.
- Autocomplete Suggestions: As users type, autocomplete suggestions are displayed to help refine their searches.
- Search Filters: Optional search filters (e.g., categories, distance, rating) enable users to narrow down their search results.
- Result Display: Search results are displayed in a clear and concise manner, including essential information such as name, address, and distance.

Design Requirements

- Responsive Design: The search page should be optimized for various devices and screen sizes.
- Accessibility: The search page should comply with WCAG 2.1 guidelines for accessibility.
- Consistent Branding: The search page should adhere to the app's branding guidelines.

Technical Requirements

- Backend Integration: The search page should integrate with the app's backend services to retrieve search results.
- Data Retrieval: The search page should retrieve data from the app's database or external data sources (e.g., Google Maps).
- Error Handling: The search page should handle errors and exceptions, such as network connectivity issues or invalid search queries.

Testing Requirements

- Unit Testing: Unit tests should be conducted to ensure individual components of the search page function correctly.
- Integration Testing: Integration tests should be conducted to ensure the search page integrates correctly with other app features and external data sources.
- User Acceptance Testing (UAT): UAT should be conducted to ensure the search page meets the required functionality, usability, and accessibility standards.

- Search Page Documentation By Ezimkamma Chukwuka Christopher
Overview
The search page is a core feature of the locator app, enabling users to find specific locations, businesses, or points of interest. This documentation provides an overview of the search page's functionality, design, and technical requirements.

Features
- Search Bar: A prominent search bar allows users to input their search queries.
- Autocomplete Suggestions: As users type, autocomplete suggestions are displayed to help refine their searches.
- Search Filters: Optional search filters (e.g., categories, distance, rating) enable users to narrow down their search results.
- Result Display: Search results are displayed in a clear and concise manner, including essential information such as name, address, and distance.

Design Requirements
- Responsive Design: The search page should be optimized for various devices and screen sizes.
- Accessibility: The search page should comply with WCAG 2.1 guidelines for accessibility.
- Consistent Branding: The search page should adhere to the app's branding guidelines.

Technical Requirements

- Backend Integration: The search page should integrate with the app's backend services to retrieve search results.
- Data Retrieval: The search page should retrieve data from the app's database or external data sources (e.g., Google Maps).
- Error Handling: The search page should handle errors and exceptions, such as network connectivity issues or invalid search queries.

Testing Requirements

- Unit Testing: Unit tests should be conducted to ensure individual components of the search page function correctly.
- Integration Testing: Integration tests should be conducted to ensure the search page integrates correctly with other app features and external data sources.
- User Acceptance Testing (UAT): UAT should be conducted to ensure the search page meets the required functionality, usability, and accessibility standards.

