import React from 'react';
import { View, Text, StyleSheet, Button } from 'react-native';

export default function Dashboard({ navigation }) {
  return (
    <View style={styles.container}>
      <Text style={styles.title}>Welcome to the Dashboard!</Text>
      <Button title="Log Out" onPress={() => navigation.navigate('Login')} />
    </View>
  );
}

const styles = StyleSheet.create({
  container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
  },
  title: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 20,
  },
});
