using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Windows.Forms;

namespace IDisposable
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            {
               //MyClass mc = new MyClass();
                System.IO.BinaryReader br = new System.IO.BinaryReader(System.IO.File.OpenRead("")));
                br.Dispose();
            }
    }
        class MyClass
        {
           public MyClass()
           {
              MessageBox.Show("I am the ctor.");
           }

            MyClass()
        {
            MessageBox.Show("I am the destructor.");
        }
      }
  }