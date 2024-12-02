import React, { useState } from 'react';
import { View, Text, Switch, Button, Image, StyleSheet, Alert } from 'react-native';
import { launchImageLibrary } from 'react-native-image-picker';

export default function SettingsScreen() {
  // State to manage dark/light theme
  const [isDarkMode, setIsDarkMode] = useState(false);
  // State for profile picture
  const [profileImage, setProfileImage] = useState(null);

  // Function to toggle Dark/Light mode
  const toggleDarkMode = () => {
    setIsDarkMode(previousState => !previousState);
  };

  // Function to handle profile picture change
  const changeProfilePicture = () => {
    launchImageLibrary({ mediaType: 'photo' }, response => {
      if (response.didCancel) {
        Alert.alert('Image picker cancelled');
      } else if (response.errorMessage) {
        Alert.alert('Image picker error: ' + response.errorMessage);
      } else {
        const { uri } = response.assets[0];
        setProfileImage(uri); // Set the new profile image
      }
    });
  };

  return (
    <View style={[styles.container, { backgroundColor: isDarkMode ? '#333' : '#fff' }]}>
      {/* Profile Picture */}
      <View style={styles.profileContainer}>
        <Text style={[styles.title, { color: isDarkMode ? '#fff' : '#000' }]}>Profile Picture</Text>
        {profileImage ? (
          <Image source={{ uri: profileImage }} style={styles.profileImage} />
        ) : (
          <Text style={[styles.text, { color: isDarkMode ? '#fff' : '#000' }]}>No Profile Picture</Text>
        )}
        <Button title="Change Profile Picture" onPress={changeProfilePicture} />
      </View>

      {/* Dark Mode Switch */}
      <View style={styles.switchContainer}>
        <Text style={[styles.title, { color: isDarkMode ? '#fff' : '#000' }]}>Dark Mode</Text>
        <Switch
          value={isDarkMode}
          onValueChange={toggleDarkMode}
          trackColor={{ false: '#767577', true: '#81b0ff' }}
          thumbColor={isDarkMode ? '#f5dd4b' : '#f4f3f4'}
        />
      </View>
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    padding: 20,
  },
  profileContainer: {
    alignItems: 'center',
    marginBottom: 40,
  },
  profileImage: {
    width: 150,
    height: 150,
    borderRadius: 75,
    marginBottom: 20,
  },
  switchContainer: {
    flexDirection: 'row',
    alignItems: 'center',
    justifyContent: 'space-between',
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
  },
  text: {
    fontSize: 16,
    marginBottom: 10,
  },
});
