using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace Threading
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }
        Thread t;
        private void button1_Click(object sender, EventArgs e)
        {
            t = new Thread(Freeze);
            t.Start();
        }
        void Freeze()
        {
            for (; ; ) ;
        }
        private void form1_Formlesson(object sender, EventArgs e)
        {
            t.Abort();
        }
    }
}
