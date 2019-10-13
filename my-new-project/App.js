import React from 'react';
import { ScrollView, StyleSheet, Text, View, Button, SafeAreaView} from 'react-native';
import Route from './Route';
export default class App extends React.Component {
  constructor(props) {
    super(props);
    this.drawer = React.createRef();
    this.navigator = React.createRef();
    console.disableYellowBox = true;
  }
  render(){
    return (
        <SafeAreaView style={styles.container}>
          <Route />
        </SafeAreaView>
    );
  }
}
