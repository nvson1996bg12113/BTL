import React from 'react';
import {View, Text} from 'react-native';
import AntDesign from 'react-native-vector-icons/AntDesign';
import Feather from 'react-native-vector-icons/Feather';
export default class HeaderForProductDetail extends React.Component{
  render()
  {
    return (
      <View style={{flexDirection: 'row', width: '100%', justifyContent: 'flex-end'}}>
          <Feather name={"search"} size={20}  color={"white"} style={{paddingRight: 20}}/>
          <AntDesign name={"hearto"} size={20}  color={"white"} style={{paddingRight: 20}}/>
      </View>
    );
  }
}
