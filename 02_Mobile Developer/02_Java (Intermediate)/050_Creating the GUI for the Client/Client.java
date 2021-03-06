import java.io.*;
import java.net.*;
import java.awt.*;
import java.awt.event.*;
import javax.swing.*;

public class Client extends JFrame{
	
	private JTextField userText;
	private JTextArea chatWindow;
	private ObjectOutputStream output;
	private ObjectInputStream input;
	private String message = "";
	private String serverIP;
	private Socket connection;
	
	//050_Creating the Gui for the client
	//Constructor
	
	public Client(String host){
	    super("Client mofo!");
	    serverIP = host;
	    userText = new JTextField();
	    userText.setEditable(false);
	    userText.addActionListener(
		 new ActionListener(){
		     public void actionPerformed(ActionEvent event){
			   sendData(event.getActionCommand());
			   userText.setText("");
		}
	  }
    );
     add(userText, BorderLayout.NORTH);
     chatWindow = new JTextArea();
     add(new JScrollPane(chatWindow), BorderLayout.CENTER);
     setSize(300,150);
     setVisible(true);
  }

    

}