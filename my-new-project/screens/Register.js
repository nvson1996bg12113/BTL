import React, { Component } from 'react';
import { Text, View, TextInput, StyleSheet, Image, Button, AsyncStorage} from 'react-native';
import System from '../components/System';
const  styles = StyleSheet.create({
    formGroup:{
      borderBottomColor: '#e3e1e1',
      borderBottomWidth: 2,
      paddingBottom: 10,
      paddingLeft: 10,
      paddingRight: 10,
      flexDirection: 'row',
      marginBottom: 10
    },
    inpControl:{
      textAlign: 'left',
      color: 'white',
      fontSize: 18,
      width: 270,
      paddingLeft: 10,
      borderRadius: 3,
      lineHeight: 30
    },
    iconControl:{
      width: 30,
      height: 30
    },
    button: {
      width: 300,
      fontFamily: 'arial',
      fontWeight: 'normal'
    }
  });
export default class Register extends Component {
  constructor(props) {
    super(props);
    this.state = {email: '', password: '', name: ''};
  }
  static navigationOptions = {
    title: 'Đăng nhập',
    headerStyle: {
      backgroundColor: 'rgba(54, 70, 255, 0.7)',
      display: 'none'
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'normal',
    },
  };
  _loginSubmit = async () =>{
    /*for kt*/
    const rootNav = this.props.screenProps.rootNavigation;

    //end for kt
    let user = this.state.email;
    let password = this.state.password;
    let name = this.state.name;
    let id = await fetch('http://10.0.3.2:8080/demo/graph/user/register', {
        method: 'POST',
        headers: {
          Accept: 'application/json',
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          email: user,
          password: password,
          name: name
        }),
      }).then((response) => response.json())
        .then((responseJson) => {
          return responseJson;
        })
        .catch((error) => {
          console.error(error);
        });

    console.log(id);
    if(id > 0)
    {
        const value = id;
        const data = {
          auth: true,
          data: null
        };
        if(value != null && value != -1)
        {
          let dataUser = await fetch('http://10.0.3.2:8080/demo/graph/user?id='+value)
          .then((response) => response.json())
          .then((responseJson) => {
            return responseJson;
          })
          .catch((error) => {
            console.error(error);
          });
          data.data = dataUser;
          data.auth = true;
        }
        try{
          await AsyncStorage.setItem('auth', JSON.stringify(data));
          //this.props.navigation.replace('MyHome');
          rootNav.navigate("MyHome");
        }catch(error)
        {
          console.error(error);
        }
      /*
      try {
          await AsyncStorage.setItem('UserId',  id.toString());
          this.props.navigation.replace('MyHome');
        } catch (error) {
          console.error(error);
        }
      */
    }
  }
  render() {
    console.log(this.props);
    return (
      <View style={{flex:1, justifyContent: 'center', padding: 25, alignItems: 'center', backgroundColor: 'rgba(0,0,0, 0.7)'}}>
        <View>
          <View style={styles.formGroup}>
            <Image source={require('../assets/iconUser.png')} style={styles.iconControl} />
            <TextInput
              placeholder={'Name'}
              value={this.state.name}
              onChangeText={(name) => this.setState({name})}
              style={styles.inpControl}
            />
          </View>
          <View style={styles.formGroup}>
            <Image source={require('../assets/iconUser.png')} style={styles.iconControl} />
            <TextInput
              placeholder={'Email'}
              value={this.state.email}
              onChangeText={(email) => this.setState({email})}
              style={styles.inpControl}
            />
          </View>
          <View style={styles.formGroup}>
            <Image source={require('../assets/iconPass.png')} style={styles.iconControl} />
            <TextInput
              secureTextEntry={true}
              placeholder={'Password'}
              value={this.state.password}
              onChangeText={(password) => this.setState({password})}
              style={styles.inpControl}
            />
          </View>
          <Button
              title="Register"
              tyle={styles.button}
              onPress={this._loginSubmit}
            />
        </View>
      </View>
    );
  }
}
