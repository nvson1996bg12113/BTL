import React from 'react';
import {View, Text, AsyncStorage} from 'react-native';
import styles from '../assets/Style';
import System from '../components/System';
export default class ProfileDesk extends React.Component{
  constructor(props)
  {
    super(props);
    this.state = {
      user: {},
      isLoading: true
    };
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
  _storeData = async () =>
  {
    try {
      const value = await AsyncStorage.getItem('UserId');
      if (value !== null) {
        // We have data!!
        console.log(value);
      }
    } catch (error) {
      // Error retrieving data
    }
  }
  componentDidMount(){
    this._storeData();
    //Here is the Trick
    const { navigation } = this.props;
    //Adding an event listner om focus
    //So whenever the screen will have focus it will set the state to zero
    this.focusListener = navigation.addListener('didFocus', () => {
        this.setState({ count: 0 });
    });
  }
  render()
  {
    return(
      <View style={styles.container}>
        {this.state.isLoading?
          <View style={{backgroundColor: 'white', padding: 15, marginBottom: 15}}>
            <Text>Chào mừng bạn</Text>
            <Text style = {{color: 'blue', fontSize: 25}}  onPress={() => this.props.navigation.navigate('Login')}>Đăng nhập/Đăng kí</Text>
          </View>
          : null
        }
      </View>);
  }
}
