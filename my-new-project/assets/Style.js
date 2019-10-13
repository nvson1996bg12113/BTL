import {StyleSheet} from 'react-native';
export default styles = StyleSheet.create({
  container: {
    flex: 1,
    flexDirection: 'column',
    backgroundColor: 'rgba(240, 240, 240, 0.6)',
    position: 'relative'
  },
  dropMenu: {
    backgroundColor: 'rgba(54, 70, 255, 0.7)',
    height: 65,
    paddingLeft: 5,
    paddingRight: 5
  },
  headerNavigation: {lineHeight: 35, padding: 15, fontSize: 20, borderBottomWidth: 1, borderBottomColor: 'lightgray', color: 'white'},
  formGroup:{
    paddingLeft: 10,
    paddingRight: 10,
    flexDirection: 'row',
    marginBottom: 10
  }
});
