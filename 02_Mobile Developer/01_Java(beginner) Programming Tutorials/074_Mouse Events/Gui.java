import java.awt.*;
import java.awt.Event.*;
import javax.swing.*;

public class Gui extends JFrame{
      private JPanel mousepanel;
      private JLabel statusbar;
      
      public Gui(){
    	    super("title");
    	    
    	    mousepanel = new JPanel();
    	    mousepanel.setBackground(Color.WHITE);
    	    add(mousepanel, BorderLayout.CENTER);
    	    
    	    statusbar = new JLabel("default");
    	    add(statusbar, BorderLayout.SOUTH);
    	    
    	    Handlerclass Handler = new Handlerclass();
    	    mousepanel.addMouseListener(handler);
    	    mousepanel.addMouseMotionListener(handler);
      }
  }