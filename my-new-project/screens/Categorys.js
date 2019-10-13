import React from 'react';
import {View, Text, TouchableOpacity, Image} from 'react-native';
import { createStackNavigator, createAppContainer } from 'react-navigation';
import CategoryHome from '../screens/CategoryHome';
import CategoryDetail from '../screens/CategoryDetail';
import System from '../components/System';
const AppNavigator = createStackNavigator({
  CategoryHome:{
    screen: CategoryHome
  },
  CategoryDetail:{
    screen: CategoryDetail
  }
});

const AppCategory = createAppContainer(AppNavigator);

export default class Category extends React.Component{
  render()
  {
    return (
      <View style={styles.container}>
        <AppCategory />
      </View>
    );
  }
}
