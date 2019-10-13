import React from 'react';
import {View, Text, AsyncStorage} from 'react-native';
import styles from '../assets/Style';
import { NavigationActions } from 'react-navigation';
import { Avatar } from 'react-native-elements';
import AntDesign from 'react-native-vector-icons/AntDesign';
import FontAwesome5 from 'react-native-vector-icons/FontAwesome5';
import System from '../components/System';
export default class ProfileScreen extends System{
  constructor(props)
  {
    super(props);
    this.state = {
      user: System.User
    };
    //navigation.getParam('reload', false);
  }
  static navigationOptions = {
    title: 'Cá nhân',
    headerStyle: {
      backgroundColor: 'rgba(54, 70, 255, 0.7)',
    },
    headerTintColor: '#fff',
    headerTitleStyle: {
      fontWeight: 'normal',
    },
  };
  async _logOut()
  {
    let clear = await AsyncStorage.clear();
    this.setState({user: System.User});
    const rootNav = this.props.screenProps.rootNavigation;
    rootNav.navigate("Login");
  }
  render(){
    const rootNav = this.props.screenProps.rootNavigation;
    if(this.state.user.auth == false)
      return(
        <View style={styles.container}>
            <View style={{backgroundColor: 'white', padding: 15, marginTop: 35}}>
              <Text>Chào mừng bạn</Text>
              <Text style = {{color: 'blue', fontSize: 20}}  onPress={() => rootNav.navigate('Login')}>Đăng nhập/Đăng kí</Text>
            </View>
        </View>);
      return (
        <View style={styles.container}>
          <View style={{backgroundColor: 'white', padding: 15, marginTop: 35, flexDirection: 'row'}}>
            <Avatar rounded source={require('../assets/avataUser.png')} size="medium"/>
            <View style={{marginLeft: 20}}>
              {this.state.user.data.name? <Text style={{fontSize: 16}}>{this.state.user.data.name}</Text> : null}
              {this.state.user.data.email? <Text style={{color: 'gray', fontSize: 10}}>{this.state.user.data.email}</Text> : null}
            </View>
          </View>
          <View style={{backgroundColor: 'white', padding: 15, marginTop: 15}}>
            <View style={{flexDirection: 'row', marginBottom: 15}}>
              <AntDesign name="infocirlce" color = "rgba(235, 52, 82, 0.7)" size={16}/>
              <Text style={{paddingLeft: 15, fontSize: 12}} onPress={() => rootNav.navigate('EditProfile')}>Chỉnh sửa thông tin</Text>
            </View>
            <View style={{flexDirection: 'row'}}>
              <AntDesign name="logout" color="rgba(3, 161, 252, 0.7)" size={16}/>
              <Text style={{paddingLeft: 15, fontSize: 12}} onPress={() => this._logOut()}>Đăng xuất</Text>
            </View>
          </View>
        </View>
      );
    }
}
