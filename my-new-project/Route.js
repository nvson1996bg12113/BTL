import React from 'react';
import {View, Text, AsyncStorage} from 'react-native';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import { createMaterialBottomTabNavigator } from 'react-navigation-material-bottom-tabs';
import Icon from 'react-native-vector-icons/Ionicons';
import Octicon from 'react-native-vector-icons/Octicons';
import FontAwesome from 'react-native-vector-icons/FontAwesome';
import HomeScreen from './screens/Home';
import Category from './screens/Categorys';
import ProfileScreen from './screens/Profile';
import Search from './screens/Search';
import ProductDetail from './screens/ProductDetail';
import LoginScreen from './screens/Login';
import EditProfile from './screens/EditProfile';
import Cart from './screens/Cart';
import System from './components/System';
import styles from './assets/Style';
const MyHome = createMaterialBottomTabNavigator({
    Home: {
      screen: HomeScreen,
      navigationOptions:{
        tabBarLabel: 'Trang chủ',
        tabBarIcon: ({tintColor}) => (
          <Octicon name="home" color={tintColor} size={20} />
        )
      }
    },
    Category: {
      screen: Category,
      navigationOptions:{
        tabBarLabel: 'Danh mục',
        tabBarIcon: ({tintColor}) => (
          <FontAwesome name="th-large" color={tintColor} size={20} />
        )
      }
    },
    User: {
      screen: ProfileScreen,
      navigationOptions: {
        tabBarLabel: 'Cá nhân',
        tabBarIcon: ({tintColor}) => (
          <FontAwesome name="user-o" color={tintColor} size={20} />
        )
      }
    },
    Search: {
      screen: Search,
      navigationOptions: {
        tabBarLabel: 'Tìm kiếm',
        tabBarIcon: ({tintColor}) => (
          <FontAwesome name="search" color={tintColor} size={20} />
        )
      }
    }
  },
  {
    initialRouteName: 'Home',
    order: ['Home','Category','User', 'Search'],
    activeColor: 'rgba(54, 70, 255, 0.9)',
    inactiveColor: 'gray',
    shifting: true,
    barStyle: { backgroundColor: 'rgba(250, 250, 250, 0.8)', shadowColor: 'lightgray', shadowOffset: {width: 3,height: 5}},
  }
);

const AppForMain = createAppContainer(MyHome);
class Main extends React.Component{
  render()
  {
    const { navigation } = this.props;
    return (
      <AppForMain screenProps={{rootNavigation: this.props.navigation, reload: navigation.getParam('reload', false)}}/>
    );
  }
}
const MyApp = createStackNavigator({
  MyHome: {
    screen: Main,
    navigationOptions:{
      headerStyle:{
        display: 'none'
      }
    }
  },
  ProductDetail: {
    screen: ProductDetail
  },
  Login:{
    screen: LoginScreen
  },
  EditProfile:{
    screen: EditProfile
  },
},{
  initialRouteName: 'MyHome'
});
const AppHome = createAppContainer(MyApp);
export default class Route extends React.Component{
  constructor(props)
  {
    super(props);
  }
  render()
  {
    return (<AppHome/>);
  }
}
