import React, { useState } from 'react';
import {
  View,
  TextInput,
  Button,
  Text,
  StyleSheet,
  Alert,
  ImageBackground,
} from 'react-native';

export default function Signup({ navigation }) {
  const [name, setName] = useState('');
  const [email, setEmail] = useState('');
  const [password, setPassword] = useState('');

  const handleSignup = () => {
    // Basic validation
    if (!name || !email || !password) {
      Alert.alert('Error', 'All fields are required!');
      return;
    }
    if (!/\S+@\S+\.\S+/.test(email)) {
      Alert.alert('Error', 'Please enter a valid email address!');
      return;
    }
    if (password.length < 6) {
      Alert.alert('Error', 'Password must be at least 6 characters long!');
      return;
    }

    // Successful signup action
    Alert.alert('Success', `Welcome, ${name}! Your account has been created.`);
  };

  return (
    <ImageBackground
      source={require('../assets/locimg.jpeg')} // Path to your local image
      style={styles.backgroundImage}
    >
      <View style={styles.container}>
        <Text style={styles.title}>Signup</Text>
        <Button
        title="Already signed in, Login now"
        onPress={() => navigation.navigate('Login')}
        />
        <TextInput
          placeholder="Name"
          value={name}
          onChangeText={setName}
          style={styles.input}
          placeholderTextColor="#fff"
        />

        <TextInput
          placeholder="Email"
          value={email}
          onChangeText={setEmail}
          style={styles.input}
          placeholderTextColor="#fff"
          keyboardType="email-address"
        />

        <TextInput
          placeholder="Password"
          value={password}
          onChangeText={setPassword}
          style={styles.input}
          placeholderTextColor="#fff"
          secureTextEntry
        />

        <View style={styles.buttonContainer}>
          <Button title="Sign Up" onPress={handleSignup} color="#f08a5d" />
        </View>
      </View>
    </ImageBackground>
  );
}

const styles = StyleSheet.create({
  backgroundImage: {
    flex: 1,
    resizeMode: 'cover',
    justifyContent: 'center',
  },
  container: {
    backgroundColor: 'rgba(0, 0, 0, 0.6)',
    padding: 20,
    borderRadius: 10,
    marginHorizontal: 20,
  },
  title: {
    fontSize: 28,
    fontWeight: 'bold',
    color: '#fff',
    textAlign: 'center',
    marginBottom: 20,
  },
  input: {
    height: 50,
    borderColor: '#fff',
    borderWidth: 1,
    borderRadius: 8,
    marginBottom: 15,
    paddingHorizontal: 10,
    color: '#fff',
  },
  buttonContainer: {
    marginTop: 10,
  },
});



