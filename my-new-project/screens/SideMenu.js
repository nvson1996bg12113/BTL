import React from 'react';
import {View, Text ,StyleSheet, ImageBackground, FlatList, TouchableOpacity, Image} from 'react-native';
import {NavigationActions} from 'react-navigation';
import System from '../components/System';
const styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'column',
    backgroundColor: 'rgba(4, 16, 140, 0.7)',
  },
  itemSideMenu: {
    lineHeight: 40,
    paddingLeft: 5,
    color: 'white'
  },
  itemSideMenuActive: {
    color: 'red'
  },
  itemSideMenuIcon:{
    width: 15,
    height: 15,
    margin: 15,
    marginRight: 5
  }
});
export default class SideMenu extends React.Component {
  navigateToScreen = (route) => () => {
    const navigateAction = NavigationActions.navigate({
      routeName: route
    });
    this.props.navigation.dispatch(navigateAction);
  }
  constructor(props)
  {
    super(props);
  }
  data()
  {
    return [
      {key: 'Home', title: 'Trang chủ'},
      {key: 'Login', title: 'Đăng nhập'},
      {key: 'Category', title: 'Danh mục'}
    ];
  }
  showItem(p)
  {
    return (
      <View>
        <TouchableOpacity onPress={this.navigateToScreen(p.key)}>
          <View style={{flexDirection: 'row'}}>
          {p.key=='Home' ? <Image style={styles.itemSideMenuIcon} source={require('../assets/icons8-home-96.png')} /> : null}
          {p.key=='Category' ? <Image style={styles.itemSideMenuIcon} source={require('../assets/icons8-hanger-96.png')} /> : null}
          {p.key=='Login' ? <Image style={styles.itemSideMenuIcon} source={require('../assets/icons8-login-96.png')} /> : null}
            <Text style={styles.itemSideMenu}>{p.title}</Text>
          </View>
        </TouchableOpacity>
      </View>
    );
  }
  render()
  {
    return(
      //require('../assets/backgroundSideMenu.jpg')
      <View style={styles.container}>
        <View style={{width: '100%', paddingTop: 25}}>
          <FlatList
          data={this.data()}
          renderItem={({item}) => this.showItem(item)}
          />
        </View>
      </View>
    );
  }
}
